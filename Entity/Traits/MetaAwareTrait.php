<?php

namespace E7\MetaBundle\Entity\Traits;

use E7\MetaBundle\Entity\Meta;
use E7\MetaBundle\Shared\MetaInterface;
use Doctrine\ORM\Mapping as ORM;

trait MetaAwareTrait
{
    /**
     * @ORM\OneToOne(targetEntity="E7\MetaBundle\Entity\Meta", cascade={"all"})
     * @var MetaInterface
     */
    private $meta;

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
    public function getMeta(): ?MetaInterface
    {
        return $this->meta;
    }
}
