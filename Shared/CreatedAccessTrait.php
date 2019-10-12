<?php

namespace E7\MetaBundle\Shared;

use DateTime;
use DateTimeInterface;
use E7\MetaBundle\Shared\UserInterface;
use Exception;

/**
 * CreatedAccessTrait
 * 
 * This trait implements the E7\MetaBundle\Shared\CreatedInterface with all
 * shared accessmethods
 */
trait CreatedAccessTrait
{
    /**
     * Set creator
     *
     * @param UserInterface $creator
     * @return self
     */
    public function setCreator(UserInterface $creator =  null)
    {
        $this->creator = $creator;
        
        return $this;
    }

    /**
     * Get creator
     *
     * @return UserInterface
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * Set createdAt
     *
     * @param DateTimeInterface $createdAt
     * @return self
     */
    public function setCreatedAt(DateTimeInterface $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return DateTimeInterface
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
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
    ) {
        if (false === $overrideCreator && null !== $this->getCreator()) {
            throw new \Exception();
        }
        return $this
            ->setCreator($creator)
            ->setCreatedAt($createdAt ?: new DateTime());    
    }
}
