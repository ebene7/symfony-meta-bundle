<?php

namespace E7\MetaBundle\Shared;

use E7\MetaBundle\Shared\UserInterface;

/**
 * OwnerInterface
 */
interface OwnerInterface 
{
    /**
     * Set owner
     *
     * @param UserInterface $owner
     * @return OwnerInterface
     */
    public function setOwner(UserInterface $owner = null);

    /**
     * Get owner
     *
     * @return UserInterface
     */
    public function getOwner();
}
