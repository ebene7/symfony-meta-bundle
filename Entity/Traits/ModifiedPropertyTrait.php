<?php

namespace E7\MetaBundle\Entity\Traits;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use E7\MetaBundle\Shared\UserInterface;

/**
 * ModifiedPropertyTrait
 * 
 * This trait implements the modified properties for entities
 */
trait ModifiedPropertyTrait
{
    /**
     * @ORM\Column(name="modifier_id", type="entitystring", nullable=true)
     * @var UserInterface
     */
    private $modifier;

    /**
     * @ORM\Column(name="modified_at", type="datetime", nullable=true)
     * @var DateTimeInterface
     */
    private $modifiedAt;
}
