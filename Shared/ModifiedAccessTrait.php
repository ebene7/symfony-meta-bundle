<?php

namespace E7\MetaBundle\Shared;

use DateTime;
use DateTimeInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * ModifiedAccessTrait
 * 
 * This trait implements the E7\MetaBundle\Shared\ModifiedInterface with all
 * shared accessmethods
 */
trait ModifiedAccessTrait
{
    /**
     * Set modifier
     *
     * @param UserInterface $modifier
     * @return self
     */
    public function setModifier(UserInterface $modifier = null)
    {
        $this->modifier = $modifier;
        
        return $this;
    }

    /**
     * Get modifier
     *
     * @return UserInterface
     */
    public function getModifier()
    {
        return $this->modifier;
    }

    /**
     * Set modifiedAt
     *
     * @param DateTimeInterface $modifiedAt
     * @return self
     */
    public function setModifiedAt(DateTimeInterface $modifiedAt = null)
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return DateTimeInterface
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }
    
    /**
     * @param UserInterface $modifier
     * @param DateTimeInterface $modifiedAt
     * @return type
     */
    public function markModified(
        UserInterface $modifier,
        DateTimeInterface $modifiedAt = null
    ) {
        return $this
            ->setModifier($modifier)
            ->setModifiedAt($modifiedAt ?: new DateTime());    
    }
}
