<?php

namespace E7\MetaBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use E7\MetaBundle\Entity\Traits;
use E7\MetaBundle\Shared\MetaInterface;

/**
 * Meta entity
 * 
 * @ORM\Table(name="e7_meta_objects")
 * @ORM\Entity(repositoryClass="E7\MetaBundle\Repository\MetaRepository")
 */
class Meta implements MetaInterface
{
    use Traits\OwnerTrait;
    use Traits\CreatedTrait;
    use Traits\ModifiedTrait;
    use Traits\MetaTypeTrait;
    
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=36)
     * @ORM\GeneratedValue(strategy="UUID")
     * @var string
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="entity_id", type="string", length=36, nullable=true)
     */
    private $entityId;
    
    public function __construct()
    {
        $this->setCreatedAt(new DateTime());
    }

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
     * Set entityId
     *
     * @param string $entityId
     * @return Meta
     */
    public function setEntityId($entityId)
    {
        $this->entityId = $entityId;

        return $this;
    }

    /**
     * Get entityId
     *
     * @return string
     */
    public function getEntityId()
    {
        return $this->entityId;
    }
}
