<?php

namespace E7\MetaBundle\Entity\Traits;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * ModifiedPropertyTrait
 * 
 * This trait implements the modified properties for entities
 */
trait ModifiedPropertyTrait
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ ORM\Column(name="modifier_id", type="entitystring", nullable=true)
     * @var UserInterface
     */
    private $modifier;

    /**
     * @ORM\Column(name="modified_at", type="datetime", nullable=true)
     * @var DateTimeInterface
     */
    private $modifiedAt;
}
