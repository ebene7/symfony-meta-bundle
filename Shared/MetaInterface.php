<?php

namespace E7\MetaBundle\Shared;

use E7\MetaBundle\Shared\CreatedInterface;
use E7\MetaBundle\Shared\DeletedInterface;
use E7\MetaBundle\Shared\ModifiedInterface;
use E7\MetaBundle\Shared\OwnerInterface;

/**
 * Marker interface for meta entities and documents
 */
interface MetaInterface 
    extends OwnerInterface, CreatedInterface, DeletedInterface, ModifiedInterface
{
}
