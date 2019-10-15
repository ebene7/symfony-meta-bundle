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
    public function setCreator(UserInterface $creator = null);

    /**
     * Get creator
     *
     * @return UserInterface
     */
    public function getCreator();

    /**
     * Set createdAt
     *
     * @param DateTimeInterface $createdAt
     * @return CreatorInterface
     */
    public function setCreatedAt(DateTimeInterface $createdAt);

    /**
     * Get createdAt
     *
     * @return DateTimeInterface
     */
    public function getCreatedAt();
    
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
        $overrideCreator = false
    );
}
