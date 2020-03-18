<?php

namespace E7\MetaBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * OwnerPropertyTrait
 * 
 * This trait implements the owner property for entities
 */
trait OwnerPropertyTrait 
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ ORM\Column(name="owner_id", type="entitystring", nullable=true)
     * @var UserInterface
     */
    private $owner;
}
