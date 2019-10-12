<?php

namespace E7\MetaBundle\Shared;

use E7\MetaBundle\Entity\MetaType;

trait MetaTypeAccessTrait
{
    /**
     * Set type
     *
     * @param MetaType $type
     * @return self
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
