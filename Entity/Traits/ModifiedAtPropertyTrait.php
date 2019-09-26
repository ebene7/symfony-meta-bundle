<?php

namespace E7\MetaBundle\Entity\Traits;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

trait ModifiedAtPropertyTrait 
{
    /**
     * @ORM\Column(name="modified_at", type="datetime")
     *
     * @var DateTimeInterface
     */
    private $modifiedAt;
}
