<?php

namespace E7\MetaBundle\Shared;

use DateTime;
use DateTimeInterface;
use Symfony\Component\Security\Core\User\UserInterface;
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
     * Has creator
     *
     * @return bool
     */
    public function hasCreator(): bool
    {
        return null !== $this->creator;
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
     * @param boolean $override
     * @return type
     * @throws Exception
     */
    public function markCreated(
        UserInterface $creator = null, 
        DateTimeInterface $createdAt = null,
        $override = false
    ) {
        if (false === $overrideCreator && null !== $this->getCreator()) {
            throw new \Exception();
        }

        if (!$this->hasCreator() || $override) {
            $this->setCreator($creator);
        }

        if (null ===  $this->createdAt || $override) {
            $this->setCreatedAt($createdAt ?: new DateTime());
        }

        return $this;
    }
    
    public function resetCreated()
    {
        $this->creator = null;
        $this->createdAt = null;
        
        return $this;
    }
}
