<?php

namespace E7\MetaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetaType
 *
 * @ORM\Table(name="e7_meta_types")
 * @ORM\Entity(repositoryClass="E7\MetaBundle\Repository\MetaTypeRepository")
 */
class MetaType
{
    /**
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue(strategy="auto")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=200)
     */
    private $type;

    /**
     * Constructor
     *
     * @param string $type
     */
    public function __construct(string $type = null)
    {
        $this->setType($type);
    }

    public function __toString()
    {
        return (string) $this->getType();
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return MetaType
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
