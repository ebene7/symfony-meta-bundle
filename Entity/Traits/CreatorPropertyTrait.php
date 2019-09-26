<?php

namespace E7\MetaBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use E7\MetaBundle\Shared\UserInterface;

trait CreatorPropertyTrait 
{
    /**
     * @ORM\Column(name="creator_id", type="string", length=36)
     * 
     * @var UserInterface
     */
    private $creator;
}
