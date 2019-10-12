<?php

namespace E7\MetaBundle\Entity\Traits;

use E7\MetaBundle\Shared\OwnerAccessTrait;

/**
 * OwnerTrait
 * 
 * This trait combines the owner property for entities and the shared
 * access methods
 */
trait OwnerTrait 
{
    use OwnerPropertyTrait;
    use OwnerAccessTrait;
}
