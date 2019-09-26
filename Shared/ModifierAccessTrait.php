<?php

namespace E7\MetaBundle\Shared;

trait ModifierAccessTrait
{
    /**
     * Set modifier
     *
     * @param UserInterface $modifier
     * @return self
     */
    public function setModifier(UserInterface $modifier = null)
    {
        $this->modifier = $modifier;
        
        return $this;
    }

    /**
     * Get modifier
     *
     * @return UserInterface
     */
    public function getModifier()
    {
        return $this->modifier;
    }
}
