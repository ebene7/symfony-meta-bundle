<?php

namespace E7\MetaBundle\Entity\Traits;

use E7\MetaBundle\Entity\Traits\CreatedPropertyTrait;
use E7\MetaBundle\Shared\CreatedAccessTrait;

/**
 * CreatedTrait
 * 
 * This trait combines the create properties for entities and the shared
 * access methods
 */
trait CreatedTrait
{
    use CreatedPropertyTrait;
    use CreatedAccessTrait;
}
