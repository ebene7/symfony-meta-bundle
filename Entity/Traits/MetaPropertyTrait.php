<?php

namespace E7\MetaBundle\Entity\Traits;

use E7\MetaBundle\Entity\MetaInterface;
use Doctrine\ORM\Mapping as ORM;

trait MetaPropertyTrait
{
    /**
     * @ORM\OneToOne(targetEntity="E7\MetaBundle\Entity\Meta", cascade={"all"})
     * @var MetaInterface
     */
    private $meta;
}
