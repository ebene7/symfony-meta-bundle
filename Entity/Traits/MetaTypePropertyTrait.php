<?php

namespace E7\MetaBundle\Entity\Traits;

/**
 * MetaTypePropertyTrait
 * 
 * This trait implements the metatype property for entities
 */
trait MetaTypePropertyTrait
{
    /**
     * @ORM\ManyToOne(targetEntity="E7\MetaBundle\Entity\MetaType", cascade={"persist"})
     * @ORM\JoinColumn(name="type_id")
     */
    private $type;
}
