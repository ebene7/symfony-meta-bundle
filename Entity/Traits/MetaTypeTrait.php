<?php

namespace E7\MetaBundle\Entity\Traits;

use E7\MetaBundle\Entity\Traits\MetaTypePropertyTrait;
use E7\MetaBundle\Shared\MetaTypeAccessTrait;

/**
 * MetaTypeTrait
 * 
 * This trait combines the metatype property for entities and the shared
 * access methods
 */
trait MetaTypeTrait
{
    use MetaTypePropertyTrait;
    use MetaTypeAccessTrait;
}
