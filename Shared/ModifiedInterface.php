<?php

namespace E7\MetaBundle\Shared;

use DateTimeInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * ModifiedInterface
 */
interface ModifiedInterface
{
    /**
     * Set modifier
     *
     * @param UserInterface $modifier
     * @return ModifiedInterface
     */
    public function setModifier(UserInterface $modifier = null);

    /**
     * Get modifier
     *
     * @return UserInterface
     */
    public function getModifier();

    /**
     * Has modifier
     *
     * @return bool
     */
    public function hasModifier(): bool;

    /**
     * Set modifiedAt
     *
     * @param DateTimeInterface $modifiedAt
     * @return self
     */
    public function setModifiedAt(DateTimeInterface $modifiedAt = null);

    /**
     * Get modifiedAt
     *
     * @return DateTimeInterface
     */
    public function getModifiedAt();
    
    /**
     * @param UserInterface $modifier
     * @param DateTimeInterface $modifiedAt
     * @return type
     */
    public function markModified(
        UserInterface $modifier,
        DateTimeInterface $modifiedAt = null
    );

    /**
     * Is modified
     *
     * @return bool
     */
    public function isModified(): bool;

    public function resetModified();
}
