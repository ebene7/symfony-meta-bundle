<?php

namespace E7\MetaBundle\Shared;

use E7\MetaBundle\Shared\UserInterface;

interface OwnerAccessInterface 
{
    /**
     * Set owner
     *
     * @param UserInterface $owner
     * @return self
     */
    public function setOwner(UserInterface $owner = null);

    /**
     * Get owner
     *
     * @return User
     */
    public function getOwner();
}
