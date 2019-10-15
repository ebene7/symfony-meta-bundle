<?php

namespace E7\MetaBundle\Shared;

use E7\MetaBundle\Shared\MetaInterface;
use E7\MetaBundle\Shared\UserInterface;

/**
 * MetaDelegateTrait
 * 
 * This trait implements delegate methods, so a MetaAware entity will behave
 * like a Meta entity. The delegate methods are nothing more than shortcuts.
 */
trait MetaDelegateTrait
{
    /**
     * Set owner
     *
     * @param UserInterface $owner
     * @return MetaInterface
     */
    public function setOwner(UserInterface $owner)
    {
        $this->getMeta()->setOwner($owner);
        
        return $this;
    }

    /**
     * Get owner
     *
     * @return UserInterface
     */
    public function getOwner()
    {
        return $this->getMeta()->getOwner();
    }
    
    /**
     * Set creator
     *
     * @param UserInterface $creator
     * @return MetaInterface
     */
    public function setCreator(UserInterface $creator = null)
    {
        $this->getMeta()->setCreator($creator);
        
        return $this;
    }

    /**
     * Get creator
     *
     * @return UserInterface
     */
    public function getCreator()
    {
        return $this->getMeta()->getCreator();
    }

    /**
     * Set createdAt
     *
     * @param DateTimeInterface $createdAt
     * @return MetaInterface
     */
    public function setCreatedAt(DateTimeInterface $createdAt)
    {
        $this->getMeta()->setCreatedAt($createdAt);
        
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return DateTimeInterface
     */
    public function getCreatedAt()
    {
        return $this->getMeta()->getCreatedAt();
    }
    
    /**
     * 
     * @param UserInterface     $creator
     * @param DateTimeInterface $createdAt
     * @param boolean           $overrideCreator
     * @return MetaInterface
     * @throws Exception
     */
    public function markCreated(
        UserInterface $creator, 
        DateTimeInterface $createdAt = null,
        $overrideCreator = false
    ) {
        $this->getMeta()->markCreated($creator, $createdAt, $overrideCreator);
        
        return $this;
    }
    
    /**
     * Set modifier
     *
     * @param UserInterface $modifier
     * @return MetaInterface
     */
    public function setModifier(UserInterface $modifier = null)
    {
        $this->getMeta()->setModifier($modifier);
        
        return $this;
    }

    /**
     * Get modifier
     *
     * @return UserInterface
     */
    public function getModifier()
    {
        return $this->getMeta()->getModifier();
    }

    /**
     * Set modifiedAt
     *
     * @param DateTimeInterface $modifiedAt
     * @return MetaInterface
     */
    public function setModifiedAt(DateTimeInterface $modifiedAt = null)
    {
        $this->setModifiedAt($modifiedAt);
        
        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return DateTimeInterface
     */
    public function getModifiedAt()
    {
        return $this->getMeta()->getModified();
    }
    
    /**
     * @param UserInterface     $modifier
     * @param DateTimeInterface $modifiedAt
     * @return MetaInterface
     */
    public function markModified(
        UserInterface $modifier,
        DateTimeInterface $modifiedAt = null
    ) {
        $this->getMeta()->markModified($modifier, $modifiedAt);
        
        return $this;
    }
}
