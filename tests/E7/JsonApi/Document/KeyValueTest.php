<?php

namespace E7\JsonApi\Document;

use E7\PHPUnit\Traits\OopTrait;

/**
 * Class KeyValueTest
 * @package E7\JsonApi\Document
 */
class KeyValueTest extends ElementTestCase
{
    use OopTrait;

    public function testConstructorPassedParameters()
    {
        $key = 'key-' . rand(1, 9999);
        $value = 'value-' . rand(1, 9999);

        $element = new KeyValue($key, $value);

        $this->assertEquals($key, $element->getKey());
        $this->assertEquals($value, $element->getValue());
    }

    /**
     * @dataProvider providerSetterAndGetter
     * @param array $input
     * @param array $expected
     */
    public function testSetterAndGetter(array $input, array $expected)
    {
        $this->doTestGetterAndSetter(new KeyValue('',''), $input['name']);
    }

    /**
     * @return array
     */
    public function providerSetterAndGetter()
    {
        return [
            'test-accessors-for-key' => [ [ 'name' => 'key' ], [] ],
            'test-accessors-for-value' => [ [ 'name' => 'value' ], [] ]
        ];
    }
}