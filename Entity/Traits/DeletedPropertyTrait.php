<?php

namespace E7\MetaBundle\Entity\Traits;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

trait DeletedPropertyTrait
{
    /**
     * @ORM\Column(name="is_deleted", type="boolean", nullable=true)
     * @var boolean 
     */
    private $isDeleted = false;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @var UserInterface
     */
    private $deleter;
    
    /**
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     * @var DateTimeInterface
     */
    private $deletedAt;
}
