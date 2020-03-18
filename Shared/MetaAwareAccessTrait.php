<?php

namespace E7\MetaBundle\Shared;

use DateTimeInterface;
use Symfony\Component\Security\Core\User\UserInterface;

trait MetaAwareAccessTrait
{
    /**
     * Get owner
     * 
     * @return UserInterface
     */
    public function getOwner(): ?UserInterface
    {
        return $this->meta->getOwner();
    }
    
    /**
     * Set owner
     * 
     * @param UserInterface $user
     * @return self
     */
    public function setOwner(UserInterface $user): self
    {
        $this->meta->setOwner($owner);
        
        return $this;
    }
    
    /**
     * Set creator
     *
     * @param UserInterface $creator
     * @return self
     */
    public function setCreator(UserInterface $creator =  null): self
    {
        $this->meta->setCreator($creator);
        
        return $this;
    }

    /**
     * Get creator
     *
     * @return UserInterface
     */
    public function getCreator(): ?UserInterface
    {
        return $this->meta->getCreator();
    }

    /**
     * Set createdAt
     *
     * @param DateTimeInterface $createdAt
     * @return self
     */
    public function setCreatedAt(DateTimeInterface $createdAt): self
    {
        $this->meta->setCreatedAt($createdAt);

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return DateTimeInterface
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->meta->getCreatedAt();
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
    ): self {
        $this->meta->markCreated($creator, $createdAt, $overrideCreator); 
        
        return $this;
    }
    
    /**
     * Set modifier
     *
     * @param UserInterface $modifier
     * @return self
     */
    public function setModifier(UserInterface $modifier = null): self
    {
        $this->meta->setModifier($modifier);
        
        return $this;
    }

    /**
     * Get modifier
     *
     * @return UserInterface
     */
    public function getModifier(): ?UserInterface
    {
        return $this->meta->getModifier();
    }

    /**
     * Set modifiedAt
     *
     * @param DateTimeInterface $modifiedAt
     * @return self
     */
    public function setModifiedAt(DateTimeInterface $modifiedAt = null): self
    {
        $this->meta->setModifiedAt($modifiedAt);

        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return DateTimeInterface
     */
    public function getModifiedAt(): ?DateTimeInterface
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
    ): self {
        $this->meta->markModified($modifier, $modifiedAt);
        
        return $this;    
    }
}
