<?php

namespace E7\JsonApi\Document;

use InvalidArgumentException;

/**
 * Class MetaTest
 * @package E7\JsonApi\Document
 */
class MetaTest extends CollectionTestCase
{
    public function testGetKeyReturnsString()
    {
        $element = new Meta();

        $this->assertEquals('meta', $element->getKey());
    }

    /**
     * @dataProvider providerAddAndAccept
     * @param array $input
     * @param array $expected
     */
    public function testAddAndAccept(array $input, array $expected)
    {
        if (!empty($expected['exception'])) {
            $this->expectException($expected['exception']);
        }

        $collection = new Meta();
        $collection->add($input['child']);

        $this->assertCount($expected['count'], $collection);
    }

    /**
     * @return array
     */
    public function providerAddAndAccept()
    {
        return [
            [
                [ 'child' => new KeyValue('key', 'value') ],
                [ 'count' => 1 ],
            ],
            [
                [ 'child' => new JsonApi() ],
                [ 'count' => 0, 'exception' => InvalidArgumentException::class],
            ],
        ];
    }
}