<?php

namespace E7\MetaBundle\Shared;

use DateTimeInterface;
use Symfony\Component\Security\Core\User\UserInterface;

interface DeletedInterface
{
    public function getIsDeleted(): bool;
    
    public function setIsDeleted(bool $isDeleted): self;
    
    public function getDeleter(): ?UserInterface;
    
    public function setDeleter(?UserInterface $deleter): self;
    
    public function getDeletedAt(): ?DateTimeInterface;
    
    public function setDeletedAt(?DateTimeInterface $deletedAt): self;
    
    public function isDeleted(): bool;
    
    public function markDeleted(
        UserInterface $deleter, 
        DateTimeInterface $deletedAt = null,
        $overrideDeleter = false
    ): self;
}
