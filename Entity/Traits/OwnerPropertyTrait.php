<?php

namespace E7\MetaBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use E7\MetaBundle\Shared\UserInterface;

/**
 * OwnerPropertyTrait
 * 
 * This trait implements the owner property for entities
 */
trait OwnerPropertyTrait 
{
    /**
     * @ORM\Column(name="owner_id", type="entitystring", nullable=true)
     * @var UserInterface
     */
    private $owner;
}
