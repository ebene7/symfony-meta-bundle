<?php

namespace E7\MetaBundle\Shared;

use DateTimeInterface;
use Symfony\Component\Security\Core\User\UserInterface;
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
     * Has creator
     *
     * @return bool
     */
    public function hasCreator(): bool;

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
     * @param boolean $override
     * @return type
     * @throws Exception
     */
    public function markCreated(
        UserInterface $creator, 
        DateTimeInterface $createdAt = null,
        $override = false
    );
    
    public function resetCreated();
}
