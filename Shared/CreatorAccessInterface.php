<?php

namespace E7\MetaBundle\Shared;

interface CreatorAccessInterface
{
    /**
     * Set creator
     *
     * @param UserInterface $creator
     * @return self
     */
    public function setCreator(UserInterface $creator = null);

    /**
     * Get creator
     *
     * @return UserInterface
     */
    public function getCreator();
}
