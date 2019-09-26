<?php

namespace E7\Test\MetaBundle\Entity;

use E7\MetaBundle\Entity\MetaType;
use E7\PHPUnit\Traits\OopTrait; 
use PHPUnit\Framework\TestCase;

class MetaTypeTest extends TestCase
{
    use OopTrait;

    public function testToString()
    {
        $expected = 'SomeType';
        
        $type = new MetaType();
        $type->setType($expected);
        
        $this->assertEquals($expected, (string) $type);
    }

    public function testGetId()
    {
        $this->assertObjectHasMethod('getId', MetaType::class);
    }

    public function testGetterAndSetterType()
    {
        $this->doTestGetterAndSetter(new MetaType(), 'type');
    }
}
