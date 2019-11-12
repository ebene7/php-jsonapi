<?php

namespace E7\JsonApi\Document;

use E7\JsonApi\Document\Data;
use E7\JsonApi\Document\Links;

/**
 * Class Relationship
 * @package E7\JsonApi\Document
 */
class Relationship extends AbstractElement
{
    /** @var string */
    private $relation;
    
    /** @var Data */
    private $data;
    
    /** @var Links */
    private $links;
    
    /**
     * Constructor
     *
     * @param string $relation
     * @param Data $data
     * @param Links $links
     */
    public function __construct(string $relation, Data $data = null, Links $links = null)
    {
        $this->relation = $relation;
        $this->data = $data;
        $this->links = $links;
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return $this->relation;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $array = [];
        
        if (null !== $this->links) {
            $array[$this->links->getKey()] = $this->links->getValue();
        }
        
        if (null !== $this->data) {
            $array[$this->data->getKey()] = $this->data->getValue();
        }
        
        return $array;
    }
    
}
