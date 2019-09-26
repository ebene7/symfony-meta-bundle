<?php

namespace E7\MetaBundle\EventListener;

use E7\UserBundle\Entity\User;
use E7\MetaBundle\Entity\MetaType;
use E7\MetaBundle\Entity\MetaAwareInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Psr\Log\LoggerInterface;

class MetaListener
{
    /** @var TokenStorageInterface */
    private $tokenStorage;

    /** @var $logger LoggerInterface */
    private $logger;

    /**
     * Constructor
     *
     * @param TokenStorageInterface $tokenStorage
     * @param LoggerInterface $logger
     */
    public function __construct(
        TokenStorageInterface $tokenStorage,
        LoggerInterface $logger
    ) {
        $this->tokenStorage = $tokenStorage;
        $this->logger = $logger;
    }

    /**
     * prePersist
     *
     * @param LifecycleEventArgs $event
     */
    public function prePersist(LifecycleEventArgs $event)
    {
        /* @var $entity MetaAwareInterface */
        $em = $event->getEntityManager();
        $entity = $event->getEntity();

        if (!$this->acceptEntity($entity)) {
            return;
        }

        $user = $this->getUser($em);

        $entity->getMeta()
               ->setType($this->getMetaType($entity, $em))
               ->setOwner($user)
               ->setCreator($user);
    }

    /**
     * postPersist
     *
     * @param LifecycleEventArgs $event
     */
    public function postPersist(LifecycleEventArgs $event)
    {
        /* @var $entity MetaAwareInterface */
        $em = $event->getEntityManager();
        $entity = $event->getEntity();

        if (!$this->acceptEntity($entity)) {
            return;
        }

        $meta = $entity->getMeta()
                       ->setEntityId($entity->getId());
        $em->persist($meta);
        $em->flush();
    }

    /**
     * preUpdate
     *
     * @param LifecycleEventArgs $event
     */
    public function preUpdate(LifecycleEventArgs $event)
    {
        /* @var $entity MetaAwareInterface */
        $em = $event->getEntityManager();
        $entity = $event->getEntity();

        if (!$this->acceptEntity($entity)) {
            return;
        }


        $meta = $entity->getMeta()->setModifier($this->getUser($em));

        $this->logger->debug('preUpdate eId='.$entity->getId().' eT=' . get_class($entity) . 'mId=' . $meta->getId());

        $em->persist($meta);
        $em->flush();
    }

    public function postUpdate(LifecycleEventArgs $event)
    {
    }

    /**
     * @param object $entity
     * @return boolean
     */
    protected function acceptEntity($entity)
    {
        return $entity instanceof MetaAwareInterface;
    }

    /**
     * @staticvar array $types
     * @param object $entity
     * @param EntityManagerInterface $em
     * @return MetaType
     */
    protected function getMetaType($entity, EntityManagerInterface $em)
    {
        static $types = [];
        $class = get_class($entity);

        foreach($em->getRepository(MetaType::class)->findAll() as $type) {
            $types[(string) $type] = $type;
        }

        if (empty($types[$class])) {
            $types[$class] = new MetaType($class);
        }

        return $types[$class];
    }

    /**
     * @param EntityManagerInterface $em
     * @return User
     */
    protected function getUser(EntityManagerInterface $em)
    {
        $user = null;

        if (null !== ($token =$this->tokenStorage->getToken())) {
            $user = $token->getUser();
        }

        if(!$user instanceof User) {
            $user = $em->getRepository(User::class)
                       ->findOneBy(array('username' => 'system'));
        }

        return $user;
    }
}
