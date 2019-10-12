<?php

namespace E7\MetaBundle\Shared;

use E7\MetaBundle\Shared\MetaInterface;

/**
 * MetaAccessTrait
 * 
 * This trait implements the E7\MetaBundle\Shared\MetaAwareInterface with all
 * shared accessmethods
 */
trait MetaAccessTrait
{
    /**
     * Set meta
     *
     * @param MetaInterface $meta
     * @return $this
     */
    public function setMeta(MetaInterface $meta)
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * Get meta
     *
     * @return MetaInterface
     */
    public function getMeta(): MetaInterface
    {
        return $this->meta;
    }
}
