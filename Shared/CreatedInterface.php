<?php

namespace E7\MetaBundle\Shared;

use DateTimeInterface;
use E7\MetaBundle\Shared\UserInterface;
use Exception;

/**
 * CreatorInterface
 */
interface CreatedInterface
{
    /**
     * Set creator
     *
     * @param UserInterface $creator
     * @return CreatorInterface
     */
    public function setCreator(UserInterface $creator = null): CreatorInterface;

    /**
     * Get creator
     *
     * @return UserInterface
     */
    public function getCreator(): UserInterface;

    /**
     * Set createdAt
     *
     * @param DateTimeInterface $createdAt
     * @return CreatorInterface
     */
    public function setCreatedAt(DateTimeInterface $createdAt): CreatorInterface;

    /**
     * Get createdAt
     *
     * @return DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface;
    
    /**
     * 
     * @param UserInterface $creator
     * @param DateTimeInterface $createdAt
     * @param boolean $overrideCreator
     * @return type
     * @throws Exception
     */
    public function markCreated(
        UserInterface $creator, 
        DateTimeInterface $createdAt = null,
        boolean $overrideCreator = false
    ): CreatorInterface;
}
