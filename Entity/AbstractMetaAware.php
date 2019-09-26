<?php

namespace E7\MetaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abstract base class for meta aware entities
 *
 * @ORM\MappedSuperclass
 */
abstract class AbstractMetaAware implements MetaInterface, MetaAwareInterface
{
    use Traits\MetaAwareTrait, Traits\MetaAccessTrait;
}
