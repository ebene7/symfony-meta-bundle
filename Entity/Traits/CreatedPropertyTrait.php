<?php

namespace E7\MetaBundle\Entity\Traits;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use E7\MetaBundle\Shared\UserInterface;

/**
 * CreatedPropertyTrait
 * 
 * This trait implements the created properties for entities
 */
trait CreatedPropertyTrait
{
    /**
     * @ORM\Column(name="creator_id", type="entitystring")
     * @var UserInterface
     */
    private $creator;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     * @var DateTimeInterface
     */
    private $createdAt;
}
