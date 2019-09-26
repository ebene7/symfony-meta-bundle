<?php

namespace E7\MetaBundle\Entity;

use E7\MetaBundle\Entity\Traits;
use E7\MetaBundle\Shared\MetaInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Meta entity
 * 
 * @ORM\Table(name="e7_meta_objects")
 * @ORM\Entity(repositoryClass="E7\MetaBundle\Repository\MetaRepository")
 */
class Meta implements MetaInterface
{
    use Traits\OwnerTrait;
    use Traits\CreatorTrait;
    use Traits\CreatedAtTrait;
    use Traits\ModifierTrait;
    use Traits\ModifiedAtTrait;
    
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=36)
     * @ORM\GeneratedValue(strategy="UUID")
     * @var string
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="MetaType", cascade={"persist"})
     * @ORM\JoinColumn(name="type_id")
     */
    private $type;
    
    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param MetaType $type
     * @return Meta
     */
    public function setType(MetaType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return MetaType
     */
    public function getType()
    {
        return $this->type;
    }
}
