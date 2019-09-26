<?php

namespace E7\MetaBundle\Entity\Traits;

use DateTimeInterface;
use E7\UserBundle\Entity\User;

trait _MetaAccessTrait
{
    /**
     * Set owner in meta
     *
     * @param User $owner
     * @return $this
     */
    public function setOwner(User $owner)
    {
        $this->getMeta()->setOwner($owner);

        return $this;
    }

    /**
     * Get owner from meta
     *
     * @return User
     */
    public function getOwner()
    {
        return $this->getMeta()->getOwner();
    }

    /**
     * Set creator in meta
     *
     * @param User $creator
     * @return $this
     */
    public function setCreator(User $creator)
    {
        $this->getMeta()->setCreator($creator);

        return $this;
    }

    /**
     * Get creator from meta
     *
     * @return User
     */
    public function getCreator()
    {
        return $this->getMeta()->getCreator();
    }

    /**
     * Set createdAt
     *
     * @param DateTimeInterface $createdAt
     * @return $this
     */
    public function setCreatedAt(DateTimeInterface $createdAt)
    {
        $this->getMeta()->setCreatedAt($createdAt);

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return DateTimeInterface
     */
    public function getCreatedAt()
    {
        return $this->getMeta()->getCreatedAt();
    }

    /**
     * Set modifiedAt
     *
     * @param DateTimeInterface $modified
     * @return $this
     */
    public function setModifiedAt(DateTimeInterface $modified)
    {
        $this->getMeta()->setModifiedAt($modified);

        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return DateTimeInterface
     */
    public function getModifiedAt()
    {
        return $this->getMeta()->getModifiedAt();
    }
}
