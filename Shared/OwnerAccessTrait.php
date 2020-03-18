<?php

namespace E7\MetaBundle\Shared;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * OwnerAccessTrait
 * 
 * This trait implements the E7\MetaBundle\Shared\OwnerInterface with all
 * shared accessmethods
 */
trait OwnerAccessTrait
{
    /**
     * Set owner
     *
     * @param UserInterface $owner
     * @return self
     */
    public function setOwner(UserInterface $owner = null)
    {
        $this->owner = $owner;
        
        return $this;
    }

    /**
     * Get owner
     *
     * @return UserInterface
     */
    public function getOwner()
    {
        return $this->owner;
    }
}
