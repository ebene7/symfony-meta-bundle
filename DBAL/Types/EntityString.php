<?php

namespace E7\MetaBundle\DBAL\Types;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use E7\MetaBundle\DBAL\Event\TypeMapperEventArgs;

/**
 * Class EntityString
 * @package E7\MetaBundle\DBAL\Type
 */
class EntityString extends Type
{
    const NAME = 'entitystring';

    /**
     * @inheritDoc
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getVarcharTypeDeclarationSQL($fieldDeclaration);
    }

    /**
     * @inheritDoc
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return $this->dispatchConverterCall($platform, TypeMapperEventArgs::TO_PHP_VALUE, $value);
    }

    /**
     * @inheritDoc
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $this->dispatchConverterCall($platform, TypeMapperEventArgs::TO_DB_VALUE, $value);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return self::NAME;
    }

    /**
     * @param AbstractPlatform $platform
     * @param string           $name
     * @param mixed            $value
     * @return mixed
     */
    protected function dispatchConverterCall(AbstractPlatform $platform, $name, $value)
    {
        $event = new TypeMapperEventArgs($name, $value);
        $platform->getEventManager()->dispatchEvent(TypeMapperEventArgs::NAME, $event);

        return $event->getResult();
    }
}
