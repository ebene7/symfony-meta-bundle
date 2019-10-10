<?php

namespace E7\MetaBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use E7\MetaBundle\Shared\UserInterface;

trait ModifierPropertyTrait 
{
    /**
     * @ORM\Column(name="modifier_id", type="entitystring")
     * 
     * @var UserInterface
     */
    private $modifier;
}
