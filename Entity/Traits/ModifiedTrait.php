<?php

namespace E7\MetaBundle\Entity\Traits;

use E7\MetaBundle\Shared\ModifiedAccessTrait;

/**
 * ModifiedTrait
 * 
 * This trait combines the modify properties for entities and the shared
 * access methods
 */
trait ModifiedTrait
{
    use ModifiedPropertyTrait;
    use ModifiedAccessTrait;
}
