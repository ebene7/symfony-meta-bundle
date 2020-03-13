<?php

namespace E7\MetaBundle\DBAL\Types;

use  Doctrine\Common\EventArgs;

class CallbackEventArgs extends EventArgs 
{
    private $value;
    private $convertedValue;
    
    public function __construct($value)
    {
        $this->value = $value;
    }
    
    public function getValue()
    {
        return $this->value;
    }

    public function setConvertedValue($convertedValue)
    {
        $this->convertedValue = $convertedValue;
        
        return $this;
    }
    
    public function getConvertedValue() 
    {
        return $this->convertedValue;
    }
}
