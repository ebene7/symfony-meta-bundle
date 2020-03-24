<?php

namespace E7\MetaBundle\Entity\Traits;

use E7\MetaBundle\Entity\Traits\DeletedPropertyTrait;
use E7\MetaBundle\Shared\DeletedAccessTrait;
trait DeletedTrait 
{
    use DeletedPropertyTrait;
    use DeletedAccessTrait;
}
