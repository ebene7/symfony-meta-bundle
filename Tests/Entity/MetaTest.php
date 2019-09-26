<?php

namespace E7\Test\MetaBundle\Entity;

use E7\MetaBundle\Entity\Meta;
use E7\MetaBundle\Shared\MetaInterface;
use E7\PHPUnit\Traits\OopTrait;
use PHPUnit\Framework\TestCase;

class MetaTest extends TestCase
{
    use OopTrait;

    public function testMetaInterface()
    {
        $this->assertTrue(new Meta() instanceof MetaInterface);
    }

    public function testGetId()
    {
        $this->assertObjectHasMethod('getId', Meta::class);
    }
}
