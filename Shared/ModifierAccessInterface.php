<?php

namespace E7\MetaBundle\Shared;

interface ModifierAccessInterface 
{
    /**
     * Set modifier
     *
     * @param UserInterface $modifier
     * @return self
     */
    public function setModifier(UserInterface $modifier = null);

    /**
     * Get modifier
     *
     * @return User
     */
    public function getModifier();
}
