<?php

namespace E7\MetaBundle\Entity\Traits;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

trait CreatedAtPropertyTrait 
{
    /**
     * @ORM\Column(name="created_at", type="datetime")
     *
     * @var DateTimeInterface
     */
    private $createdAt;
}
