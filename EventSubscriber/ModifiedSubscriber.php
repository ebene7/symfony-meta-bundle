<?php

namespace E7\MetaBundle\EventSubscriber;

use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use E7\MetaBundle\Shared\ModifiedInterface;

class ModifiedSubscriber extends AbstractMetaSubscriber
{
    public function getSubscribedEvents()
    {
        return [
            Events::preUpdate,
        ];
    }
    
    public function preUpdate(LifecycleEventArgs $args)
    {
        if (!$this->supports($args->getObject())) {
            return;
        }
        
        $args->getObject()->markModified($this->getUser());
    }
    
    protected function supports($object): bool
    {
        return $object instanceof ModifiedInterface;
    }
}
