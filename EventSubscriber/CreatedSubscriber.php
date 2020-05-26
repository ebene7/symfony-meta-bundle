<?php

namespace E7\MetaBundle\EventSubscriber;

use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use E7\MetaBundle\Shared\CreatedInterface;
use E7\MetaBundle\Shared\OwnerInterface;

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

        $entity->markCreated($user);
    }
    
    protected function supports($object): bool
    {
        return $object instanceof CreatedInterface;
    }
}
