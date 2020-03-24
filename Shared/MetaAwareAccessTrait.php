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
    
    public function getIsDeleted(): bool
    {
        return $this->meta->getIsDeleted();
    }
    
    public function setIsDeleted(bool $isDeleted): self
    {
        $this->meta->setIsDeleted($isDeleted);
        
        return $this;
    }
    
    public function getDeleter(): ?UserInterface
    {
        return $this->meta->getDeleter();
    }
    
    public function setDeleter(?UserInterface $deleter): self
    {
        $this->meta->setDeleter($deleter);
        
        return $this;
    }
    
    public function getDeletedAt(): ?DateTimeInterface
    {
        return $this->meta->getDeletedAt();
    }
    
    public function setDeletedAt(?DateTimeInterface $deletedAt): self
    {
        $this->meta->setDeletedAt($deletedAt);
        
        return $this;
    }
    
    public function isDeleted(): bool
    {
        return $this->meta->isDeleted();
    }
    
    public function markDeleted(
        UserInterface $deleter, 
        DateTimeInterface $deletedAt = null,
        $overrideDeleter = false
    ): self {
        $this->meta->markDeleted($deleter, $deletedAt, $overrideDeleter);
        
        return $this;    
    }
}
