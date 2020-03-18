<?php

namespace E7\MetaBundle\EventListener;

use E7\MetaBundle\Entity\Meta;
use E7\MetaBundle\Entity\MetaType;
use E7\MetaBundle\Shared\MetaAwareInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Psr\Log\LoggerInterface;
use DateTime;
use Symfony\Component\Security\Core\Security;

/**
 * MetaListener
 */
class MetaListener
{
    /** @var Security */
    private $security;

    /** @var $logger LoggerInterface */
    private $logger;

    public function __construct(
        Security $security,
        LoggerInterface $logger
    ) {
        $this->security = $security;
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

//        $user = $this->getUser($em);
        $user = $entity->getOwner();

        if (null === ($meta = $entity->getMeta())) {
            $meta = new Meta();
            $entity->setMeta($meta);
        }
        $meta
               ->setType($this->getMetaType($entity, $em))
               ->setOwner($user)
               ->setCreator($user)
               ->setCreatedAt(new DateTime());
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
        
        if (null === $entity->getMeta()) {
            $meta = new Meta();
            $meta
                ->setType($this->getMetaType($entity, $em))
                ->setOwner($user)
                ->setCreator($user)
                ->setCreatedAt(new DateTime());
            $entity->setMeta($meta);
        }
    }

    /**
     * @param LifecycleEventArgs $event
     */
    public function postUpdate(LifecycleEventArgs $event)
    {
        /* @var $entity MetaAwareInterface */
        $em = $event->getEntityManager();
        $entity = $event->getEntity();
        
        if (!$this->acceptEntity($entity)) {
            return;
        }

        $user = $this->getUser();
        
        if (null === ($meta = $entity->getMeta())) {
            $meta = new Meta();
            $meta
                ->setCreator($user)
                ->setCreatedAt()
                ->setOwner($user);
        }
        
        $meta    
            ->setModifier($meta->getOwner())
            ->setModifiedAt(new DateTime());

        $this->logger->debug('preUpdate eId='.$entity->getId().' eT=' . get_class($entity) 
                . 'mId=' . $meta->getId());
        $em->persist($meta);
        $em->flush();
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
        
//        App\Entity\Person:35
        
        return $this->converter->convert('App\Entity\Person:35');
//        $user = null;

////        return new TestUser();
//        
//        if (null !== ($token =$this->tokenStorage->getToken())) {
//            $user = $token->getUser();
//        }
//
//        if(!$user instanceof User) {
//            $user = $em->getRepository(User::class)
//                       ->findOneBy(array('username' => 'system'));
//        }

        return $user;
    }
}
