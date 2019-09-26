<?php

namespace E7\MetaBundle\Shared;

use DateTimeInterface;

interface CreatedAtAccessInterface
{
    /**
     * Set createdAt
     *
     * @param DateTimeInterface $createdAt
     * @return self
     */
    public function setCreatedAt(DateTimeInterface $createdAt = null);

    /**
     * Get createdAt
     *
     * @return DateTimeInterface
     */
    public function getCreatedAt();
}
