<?php

namespace E7\MetaBundle\EventSubscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Security;

class AbstractMetaSubscriber implements EventSubscriber
{
    private $security;
    
    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    
    protected function getSecurity(): Security
    {
        return $this->security;
    }
    
    protected function getUser()
    {
        return $this->getSecurity()->getUser();
    }
    
    /**
     * @param mixed $object
     * @return boolean
     */
    protected function supports($object): bool
    {
        return false;
    }
}
