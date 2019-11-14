<?php

namespace E7\JsonApi\Document;

use E7\JsonApi\Document\Attributes;
use E7\JsonApi\Document\Links;
use E7\JsonApi\Document\Relationships;

/**
 * Class Resource
 * @package E7\JsonApi\Document
 */
class Resource extends ResourceIdentifier
{
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
        parent::__construct($type, $id);
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
     * Set attributes
     *
     * @param Attributes $attributes
     * @return Resource
     */
    public function setAttributes(Attributes $attributes): Resource
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Get attributes
     *
     * @return Attributes
     */
    public function getAttributes(): Attributes
    {
        return $this->attributes;
    }

    /**
     * Set relationships
     *
     * @param Relationships $relationships
     * @return Resource
     */
    public function setRelationships(Relationships $relationships): Resource
    {
        $this->relationships = $relationships;

        return $this;
    }

    /**
     * Get relationships
     *
     * @return Relationships
     */
    public function getRelationships(): Relationships
    {
        return $this->relationships;
    }

    /**
     * Set links
     *
     * @param Links $links
     * @return Resource
     */
    public function setLinks(Links $links): Resource
    {
        $this->links = $links;

        return $this;
    }

    /**
     * Get links
     *
     * @return Links
     */
    public function getLinks(): Links
    {
        return $this->links;
    }

    /**
     * @inheritDoc
     */
    public function fromArray(array $data): AbstractElement
    {
        parent::fromArray($data);
        
        if (!empty($data['attributes'])) {
            $attributes = new Attributes();
            $attributes->fromArray($data['attributes']);
            $this->setAttributes($attributes);
        }

        if (!empty($data['relationships'])) {
            $relationships = new Relationships();
            $relationships->fromArray($data['relationships']);
            $this->setRelationships($relationships);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray():array
    {
        $data = parent::toArray();

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
