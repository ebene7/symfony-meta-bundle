<?php

namespace E7\MetaBundle\Entity;

use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use E7\UserBundle\Entity\User;
use Serializable;

/**
 * Meta
 *
 * @ORM\Table(name="e7_meta_objects")
 * @ORM\Entity(repositoryClass="E7\MetaBundle\Repository\MetaRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Meta implements Serializable, MetaInterface
{
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
     * @var integer
     *
     * @ORM\Column(name="entity_id", type="string", length=36, nullable=true)
     */
    private $entityId;

    /**
     * @ORM\ManyToOne(targetEntity="\E7\UserBundle\Entity\User")
     */
    private $owner;

    /**
     * @ORM\ManyToOne(targetEntity="\E7\UserBundle\Entity\User")
     */
    private $creator;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="\E7\UserBundle\Entity\User")
     */
    private $modifier;

    /**
     * @var DateTimeInterface
     *
     * @ORM\Column(name="modified_at", type="datetime", nullable=true)
     */
    private $modifiedAt;

    /**
     * @ORM\Column(name="deleted", type="boolean")
     * @var boolean
     */
    private $deleted = false;

    /**
     * @ORM\ManyToOne(targetEntity="\E7\UserBundle\Entity\User")
     */
    private $deleter;

    /**
     * @var DateTimeInterface
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setCreatedAt();
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id
        ) = unserialize($serialized);
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

    /**
     * Set owner
     *
     * @param User $owner
     * @return Meta
     */
    public function setOwner(User $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set creator
     *
     * @param User $creator
     * @return Meta
     */
    public function setCreator(User $creator = null)
    {
        $this->creator = $creator;

        return $this;
    }

    /**
     * Get creator
     *
     * @return User
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * Set createdAt
     *
     * @param DateTimeInterface $createdAt
     * @return Meta
     */
    public function setCreatedAt(DateTimeInterface $createdAt = null)
    {
        $this->createdAt = $createdAt ?: new DateTime();

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return DateTimeInterface
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set modifier
     *
     * @param User $modifier
     * @return Meta
     */
    public function setModifier(User $modifier = null)
    {
        $this->modifier = $modifier;

        return $this;
    }

    /**
     * Get modifier
     *
     * @return User
     */
    public function getModifier()
    {
        return $this->modifier;
    }

    /**
     * Set modifiedAt
     *
     * @param DateTimeInterface $modifiedAt
     * @return Meta
     */
    public function setModifiedAt(DateTimeInterface $modifiedAt = null)
    {
        $this->modifiedAt = $modifiedAt ?: new DateTime();

        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return DateTimeInterface
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     * @return Meta
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
        $this->setDeletedAt($deleted ? new \DateTime() : null);
        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Set deleter
     *
     * @param User $deleter
     * @return Meta
     */
    public function setDeleter(User $deleter = null)
    {
        $this->deleter = $deleter;

        return $this;
    }

    /**
     * Get deleter
     *
     * @return \E7\UserBundle\Entity\User
     */
    public function getDeleter()
    {
        return $this->deleter;
    }

    /**
     * Set deleted_at
     *
     * @param DateTimeInterface $deletedAt
     * @return Meta
     */
    public function setDeletedAt(DateTimeInterface $deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deleted_at
     *
     * @return DateTimeInterface
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    public function setEntity($entity)
    {
        $entity->setMeta($this);

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->setCreatedAt();

        return $this;
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->setModifiedAt();

        return $this;
    }
}
