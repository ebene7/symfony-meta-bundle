<?php

namespace E7\MetaBundle\Shared;

interface MetaAccessInterface
    extends 
        OwnerAccessInterface, 
        CreatorAccessInterface,
        CreatedAtAccessInterface,
        ModifierAccessInterface
{
}
