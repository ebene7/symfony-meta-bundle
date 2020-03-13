<?php

namespace E7\MetaBundle\DBAL\Types;

use Doctrine\DBAL\Types\BooleanType;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class CallbackType extends Type
{
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
//        return $platform->getBinaryTypeDeclarationSQL($fieldDeclaration);
    }
    
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $dispatcher = $platform->getEventManager();
        return $value;
    }
    
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        $dispatcher = $platform->getEventManager();
    }
    
    public function getName()
    {
        return;
    }
}
