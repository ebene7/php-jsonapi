<?php

namespace E7\JsonApi\Document;

use E7\JsonApi\Document\Attributes;
use E7\JsonApi\Document\Links;
use E7\JsonApi\Document\Relationships;

/**
 * Class Resource
 * @package E7\JsonApi\Document
 */
class Resource extends AbstractElement
{
    /** @var string */
    private $type;
    
    /** @var string */
    private $id;
    
    /** @var Attributes */
    private $attributes;
    
    /** @var Relationships */
    private $relationships;
    
    /** @var Links */
    private $links;
    
    /**
     * Constructor
     * 
     * @param string $type
     * @param string $id
     * @param Attributes $attributes
     * @param Relationships $relationships
     * @param Links $links
     */
    public function __construct(
        $type = null, 
        $id = null,
        Attributes $attributes = null,
        Relationships $relationships = null,
        Links $links = null
    ) {
        $this->type = $type;
        $this->id = $id;
        $this->attributes = $attributes;
        $this->relationships = $relationships;
        $this->links = $links;
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'resource';
    }

    /**
     * @inheritDoc
     */
    public function toArray():array
    {
        $data = [];
        
        if (null !== $this->type) {
            $data['type'] = $this->type;
        }
        
        if (null !== $this->id) {
            $data['id'] = $this->id;
        }
        
        if (null !== $this->attributes) {
            $data[$this->attributes->getKey()] = $this->attributes->getValue();
        }

        if (null !== $this->relationships) {
            $data[$this->relationships->getKey()] = $this->relationships->getValue();
        }

        if (null !== $this->links) {
            $data[$this->links->getKey()] = $this->links->getValue();
        }        
        
        return $data;
    }

}
