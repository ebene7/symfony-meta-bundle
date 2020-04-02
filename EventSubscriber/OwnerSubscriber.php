<?php

namespace E7\MetaBundle\EventSubscriber;

use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use E7\MetaBundle\Shared\OwnerInterface;

class OwnerSubscriber extends AbstractMetaSubscriber
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
        
        $object = $args->getObject();
        
        if (empty($object->getOwner())) {
            $object->setOwner($this->getOwner());
        }
    }
    
    protected function supports($object): bool
    {
        return $object instanceof OwnerInterface;
    }
}
