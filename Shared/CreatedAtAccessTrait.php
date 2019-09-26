<?php

namespace E7\MetaBundle\Shared;

use DateTimeInterface;

trait CreatedAtAccessTrait
{
    /**
     * Set createdAt
     *
     * @param DateTimeInterface $createdAt
     * @return self
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
}
