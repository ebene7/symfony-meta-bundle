<?php

namespace E7\MetaBundle\Entity\Traits;

use E7\MetaBundle\Shared\Meta;
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
    public function setMeta(MetaInterface $meta = null)
    {
        $this->meta = $meta ?: new Meta();

        return $this;
    }

    /**
     * Get meta
     *
     * @return MetaInterface
     */
    public function getMeta(): MetaInterface
    {
        if (null === $this->meta) {
            $this->meta = new Meta();
        }
        return $this->meta;
    }
}
