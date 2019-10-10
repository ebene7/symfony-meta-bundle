<?php

namespace E7\MetaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use E7\MetaBundle\Shared\MetaInterface;
use E7\MetaBundle\Shared\MetaAwareInterface;

/**
 * Abstract base class for meta aware entities
 *
 * @ORM\MappedSuperclass
 */
abstract class AbstractMetaAware implements MetaInterface, MetaAwareInterface
{
    use Traits\MetaAwareTrait, Traits\MetaAccessTrait;
}
