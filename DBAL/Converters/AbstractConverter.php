<?php

namespace E7\MetaBundle\DBAL\Converters;

/**
 * Class AbstractConverter
 * @package E7\MetaBundle\DBAL\Converters
 */
abstract class AbstractConverter implements ConverterInterface
{
    /**
     * @param mixed $value
     * @return mixed The converted value
     * @throws \Exception
     */
    public function convert($value)
    {
        if (!$this->accept($value)) {
            throw new \Exception("Cannot convert this value...");
        }
        return $this->doConvert($value);
    }

    /**
     * @param $value
     * @return mixed The converted value
     */
    protected abstract function doConvert($value);
}
