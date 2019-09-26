<?php

namespace E7\MetaBundle\Shared;

use DateTimeInterface;

trait ModifiedAtAccessTrait
{
    /**
     * Set modifiedAt
     *
     * @param DateTimeInterface $modifiedAt
     * @return self
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
}
