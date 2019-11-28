<?php

namespace E7\JsonApi\Document;

use E7\JsonApi\Document\Attributes;
use E7\JsonApi\Document\Links;
use E7\JsonApi\Document\Relationships;
use E7\JsonApi\Document\Traits\LinksAwareTrait;

/**
 * Class Resource
 * @package E7\JsonApi\Document
 */
class Resource extends ResourceIdentifier
{
    use LinksAwareTrait;

    /** @var Attributes */
    private $attributes;
    
    /** @var Relationships */
    private $relationships;

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
        $this->setLinks($links);
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
     * @inheritDoc
     */
    public function fromArray(array $data): AbstractElement
    {
        parent::fromArray($data);
        
        if (!empty($data['attributes'])) {
            $this->setAttributes($this->createOrPassElement(Attributes::class, $data['attributes']));
        }

        if (!empty($data['relationships'])) {
            $this->setRelationships($this->createOrPassElement(Relationships::class, $data['relationships']));
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
