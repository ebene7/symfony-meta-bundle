<?php

namespace E7\MetaBundle\Shared;

use DateTime;
use DateTimeInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * CreatedAccessTrait
 * 
 * This trait implements the E7\MetaBundle\Shared\DeletedInterface with all
 * shared accessmethods
 */
trait DeletedAccessTrait
{
    public function getIsDeleted(): bool
    {
        return $this->isDeleted;
    }
    
    public function setIsDeleted(bool $isDeleted): self
    {
        $this->isDeleted = $isDeleted;
        
        return $this;
    }
    
    public function getDeleter(): ?UserInterface
    {
        return $this->deleter;
    }
    
    public function setDeleter(?UserInterface $deleter): self
    {
        $this->deleter = $deleter;
        
        return $this;
    }
    
    public function getDeletedAt(): ?DateTimeInterface
    {
        return $this->deletedAt;
    }
    
    public function setDeletedAt(?DateTimeInterface $deletedAt): self
    {
        $this->deletedAt = $deletedAt;
        
        return $this;
    }
    
    public function isDeleted(): bool
    {
        return $this->isDeleted;
    }
    
    public function markDeleted(
        UserInterface $deleter, 
        DateTimeInterface $deletedAt = null,
        $overrideDeleter = false
    ): self {
        if (false === $overrideDeleter && null !== $this->getDeleter()) {
            throw new \Exception();
        }
        return $this
            ->setDeleter($deleter)
            ->setDeletedAt($deletedAt ?: new DateTime());    
    }
}
