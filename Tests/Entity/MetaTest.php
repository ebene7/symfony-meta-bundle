<?php

namespace E7\Test\MetaBundle\Entity;

use DateTime;
use DateTimeInterface;
use E7\MetaBundle\Entity\Meta;
use E7\MetaBundle\Entity\MetaType;
use E7\MetaBundle\Shared\MetaInterface;
use E7\MetaBundle\Shared\UserInterface;
use E7\PHPUnit\Traits\OopTrait;
use Exception;
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

    /**
     * @dataProvider providerGetterAndSetter
     * @param string $property
     * @param mixed $value
     */
    public function testGetterAndSetter(string $property, $value = null)
    {
        $this->doTestGetterAndSetter(new Meta(), $property, $value);
    }

    /**
     * return array
     */
    public function providerGetterAndSetter()
    {
        return [
            [ 'type', new MetaType() ],
            [ 'entityId' ],
            [ 'owner', $this->createDummyUser() ],
            [ 'creator', $this->createDummyUser() ],
            [ 'createdAt', new DateTime() ],
            [ 'modifier', $this->createDummyUser() ],
            [ 'modifiedAt', new DateTime() ],
        ];
    }

    /**
     * @dataProvider providerMarkCreated
     * @param array $input
     * @param array $expected
     */
    public function testMarkCreated(array $input, array $expected)
    {
        // prepare
        $meta = new Meta();
        $meta->setCreator($input['previous_creator']);

        if (null !== $expected['exception']) {
            $this->expectException($expected['exception']);
        }

        // test preconditions
        $this->assertNotSame($input['previous_creator'], $input['creator']);
        $this->assertSame($input['previous_creator'], $meta->getCreator());
        $this->assertNull($meta->getCreatedAt());

        // execute
        $meta->markCreated($input['creator'], $input['created_at'], $input['override_creator']);

        // test
        $this->assertSame($expected['creator'], $meta->getCreator());

        if (null === $input['created_at']) {
            $this->assertInstanceOf(DateTimeInterface::class, $meta->getCreatedAt());
        } else {
            $this->assertSame($input['created_at'], $meta->getCreatedAt());
        }
    }

    /**
     * @return array
     */
    public function providerMarkCreated()
    {
        $creator = $this->createDummyUser();
        $previousCreator = $this->createDummyUser('previous');

        return [
            'no-previous-creator-set-and-without-date' => [
                [
                    'creator' => $creator,
                    'previous_creator' => null,
                    'created_at' => null,
                    'override_creator' => false,
                ],
                [
                    'creator' => $creator,
                    'exception' => null,
                ]
            ],
            'no-previous-creator-set-and-with-date' => [
                [
                    'creator' => $creator,
                    'previous_creator' => null,
                    'created_at' => new DateTime('2019-10-11'),
                    'override_creator' => false,
                ],
                [
                    'creator' => $creator,
                    'exception' => null,
                ]
            ],
            'previous-creator-set-without-override-flag' => [
                [
                    'creator' => $creator,
                    'previous_creator' => $previousCreator,
                    'created_at' => null,
                    'override_creator' => false,
                ],
                [
                    'creator' => $creator,
                    'exception' => Exception::class,
                ]
            ],
            'previous-creator-set-with-override-flag' => [
                [
                    'creator' => $creator,
                    'previous_creator' => $previousCreator,
                    'created_at' => null,
                    'override_creator' => true,
                ],
                [
                    'creator' => $creator,
                    'exception' => null,
                ]
            ],
        ];
    }

    /**
     * @dataProvider providerMarkModified
     * @param array $input
     * @param array $expected
     */
    public function testMarkModified(array $input, array $expected)
    {
        // prepare
        $meta = new Meta();

        // test preconditions
        $this->assertNull($meta->getModifier());
        $this->assertNull($meta->getModifiedAt());

        // execute
        $meta->markModified($input['modifier'], $input['modified_at']);

        // test
        $this->assertSame($expected['modifier'], $meta->getModifier());

        if (null === $input['modified_at']) {
            $this->assertInstanceOf(DateTimeInterface::class, $meta->getModifiedAt());
        } else {
            $this->assertSame($input['modified_at'], $meta->getModifiedAt());
        }
    }

    /**
     * @return array
     */
    public function providerMarkModified()
    {
        $modifier = $this->createDummyUser();
        $modifiedAt = new DateTime('2019-10-11');

        return [
            'without-date' => [
                [
                    'modifier' => $modifier,
                    'modified_at' => null,
                ],
                [
                    'modifier' => $modifier,
                ]
            ],
            'with-date' => [
                [
                    'modifier' => $modifier,
                    'modified_at' => $modifiedAt,
                ],
                [
                    'modifier' => $modifier,
                    'modified_at' => $modifiedAt,
                ]
            ],
        ];
    }

    /**
     * @return UserInterface
     */
    protected function createDummyUser($id = 1)
    {
        return new class($id) implements UserInterface {
            private $id;
            public function __construct($id) {
                $this->id = $id;
            }
        };
    }
}
