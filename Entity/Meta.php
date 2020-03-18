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
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(name="entity_id", type="bigint", nullable=true)
     */
    private $entityId;
    
    public function __construct()
    {
        $this->setCreatedAt(new DateTime());
    }

    public function __toString()
    {
        return sprintf("Meta:%s", $this->getId());
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set entityId
     *
     * @param integer $entityId
     * @return Meta
     */
    public function setEntityId(int $entityId): self
    {
        $this->entityId = $entityId;

        return $this;
    }

    /**
     * Get entityId
     *
     * @return integer
     */
    public function getEntityId(): int
    {
        return $this->entityId;
    }
}
