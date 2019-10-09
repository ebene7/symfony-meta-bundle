<?php

namespace E7\MetaBundle\EventListener;

use Doctrine\DBAL\Types\Type;
use E7\MetaBundle\DBAL\Converters\ChainConverter;
use E7\MetaBundle\DBAL\Event\TypeMapperEventArgs;
use E7\MetaBundle\DBAL\Types\EntityString;
use Symfony\Component\DependencyInjection\Container;

/**
 * Class MappingListener
 * @package E7\MetaBundle\EventListener
 */
class MappingListener
{
    /**
     * @var Container
     */
    private $container;

    /**
     * SomeListener constructor.
     * @param Container $container
     * @return void
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function onKernelRequest()
    {
        if (!Type::hasType('entitystring')) {
            Type::addType('entitystring', EntityString::class);
        }
    }

    /**
     * @param TypeMapperEventArgs $event
     * @return void
     */
    public function onMapping(TypeMapperEventArgs $event)
    {
        $converter = $this->container->get(ChainConverter::class);

        if ($converter->accept($event->getValue())) {
            $event->setResult(
                $converter->convert($event->getValue())
            );
        }
    }
}