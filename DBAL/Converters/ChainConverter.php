<?php

namespace E7\MetaBundle\DBAL\Converters;

/**
 * Class ChainConverter
 * @package E7\MetaBundle\DBAL\Converter
 */
class ChainConverter extends AbstractConverter
{
    /** @var array */
    private $converters;

    /**
     * ChainConverter constructor.
     * @param $converters
     */
    public function __construct($converters)
    {
        if ($converters instanceof \IteratorAggregate) {
            $converters = iterator_to_array($converters->getIterator());
        }

        $this->converters = $converters;
    }

    /**
     * @inheritDoc
     */
    protected function doConvert($value)
    {
        foreach ($this->converters as $converter) {
            if (!$converter->accept($value)) {
                continue;
            }
            return $converter->convert($value);
        }

        throw new \Exception('Cannot convert value');
    }

    /**
     * @inheritDoc
     */
    public function accept($value)
    {
        foreach ($this->converters as $converter) {
            if ($converter->accept($value)) {
                return true;
            }
        }

        return false;
    }
}
