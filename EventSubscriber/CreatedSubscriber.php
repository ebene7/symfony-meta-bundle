<?php

namespace E7\MetaBundle\EventSubscriber;

use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use E7\MetaBundle\Shared\CreatedInterface;

class CreatedSubscriber extends AbstractMetaSubscriber
{
    public function getSubscribedEvents()
    {
        return [
            Events::prePersist,
        ];
    }
    
    public function prePersist(LifecycleEventArgs $args)
    {
        if (!$this->supports($args->getObject())) {
            return;
        }

        $entity = $args->getObject();
        $user = $this->getUser();

        if (!$entity->hasOwner()) {
            $entity->setOwner($user);
        }

        $args->getObject()->markCreated($user);
    }
    
    protected function supports($object): bool
    {
        return $object instanceof CreatedInterface;
    }
}
