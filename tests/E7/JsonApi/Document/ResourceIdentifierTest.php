<?php

namespace E7\JsonApi\Document;

/**
 * Class ResourceIdentifierTest
 *
 * @package E7\JsonApi\Document
 */
class ResourceIdentifierTest extends ElementTestCase
{
    public function testInstanceOf()
    {
        $this->doTestInstanceOf(new ResourceIdentifier());
    }
    
    public function testConstructorPassesParameters()
    {
        $type = 'awesome-type';
        $id = 42;
        
        $element = new ResourceIdentifier($type, $id);
        
        $this->assertEquals($type, $element->getType());
        $this->assertEquals($id, $element->getId());
    }
    
    public function testCreateFromArray()
    {
        $type = 'awesome-type';
        $id = 42;
        
        $element = ResourceIdentifier::createFromArray([
            'type' => $type,
            'id' => $id,
        ]);
        
        $this->assertInstanceOf(ResourceIdentifier::class, $element);
        $this->assertEquals($type, $element->getType());
        $this->assertEquals($id, $element->getId());
    }
    
    public function testCreateFromJson()
    {
        $json = '{ "type": "awesome-type", "id": 42}';
        $element = ResourceIdentifier::createFromJson($json);
        
        $this->assertInstanceOf(ResourceIdentifier::class, $element);
        $this->assertEquals('awesome-type', $element->getType());
        $this->assertEquals(42, $element->getId());
    }
    
    public function testGetKey()
    {
        $this->doTestGetKey(new ResourceIdentifier());
    }
}
