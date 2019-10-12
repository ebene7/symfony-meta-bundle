<?php

namespace E7\MetaBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use E7\MetaBundle\Shared\MetaInterface;

/**
 * MetaPropertyTrait
 * 
 * This trait implements the meta property for meta aware entities
 */
trait MetaPropertyTrait
{
    /**
     * @ORM\OneToOne(targetEntity="E7\MetaBundle\Entity\Meta", cascade={"all"})
     * @var MetaInterface
     */
    private $meta;
}
