<?php

namespace E7\JsonApi\Document;

use PHPUnit\Framework\TestCase;

/**
 * Class ElementTestCase
 * @package E7\JsonApi\Document
 */
class ElementTestCase extends TestCase
{
    /**
     * Test template
     * 
     * @param object $element
     */
    protected function doTestInstanceOf($element)
    {
        $this->assertInstanceOf(ElementInterface::class, $element);
    }
    
    /**
     * Test template
     * 
     * @param string $class
     */
    public function doTestCreateFromArray(string $class)
    {
        $element = $class::createFromArray([]);
        
        $this->assertInstanceOf($class, $element);
    }

    /**
     * Test template
     *
     * @param object $element
     * @param string $expectedKey
     */
    protected function doTestGetKey($element, string $expectedKey)
    {
        $this->assertTrue(method_exists($element, 'getKey'));
        $this->assertInternalType('string', $element->getKey());
        $this->assertEquals($expectedKey, $element->getKey());
    }
}
