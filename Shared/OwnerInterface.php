<?php

namespace E7\MetaBundle\Shared;

use Symfony\Component\Security\Core\User\UserInterface;

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

    /**
     * Has owner
     *
     * @return bool
     */
    public function hasOwner(): bool;
}
