<?php

namespace E7\MetaBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use E7\MetaBundle\Shared\UserInterface;

trait OwnerPropertyTrait 
{
    /**
     * @ORM\Column(name="owner_id", type="entitystring")
     * @var UserInterface
     */
    private $owner;
}
