<?php

namespace E7\MetaBundle\Shared;

trait CreatorAccessTrait
{
    /**
     * Set creator
     *
     * @param UserInterface $creator
     * @return self
     */
    public function setCreator(UserInterface $creator = null)
    {
        $this->creator = $creator;
        
        return $this;
    }

    /**
     * Get creator
     *
     * @return UserInterface
     */
    public function getCreator()
    {
        return $this->creator;
    }
}
