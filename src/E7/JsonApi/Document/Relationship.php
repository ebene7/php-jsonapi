<?php

namespace E7\JsonApi\Document;

use E7\JsonApi\Document\Data;
use E7\JsonApi\Document\Links;
use E7\JsonApi\Document\Traits\DataAwareTrait;
use E7\JsonApi\Document\Traits\LinksAwareTrait;

/**
 * Class Relationship
 * @package E7\JsonApi\Document
 */
class Relationship extends AbstractElement
{
    use DataAwareTrait;
    use LinksAwareTrait;

    /** @var string */
    private $relation;

    /**
     * Constructor
     *
     * @param string $relation
     * @param Data $data
     * @param Links $links
     */
    public function __construct(string $relation = null, Data $data = null, Links $links = null)
    {
        $this->relation = $relation;
        $this->setData($data);
        $this->setLinks($links);
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return $this->relation;
    }

    /**
     * Set relation
     *
     * @param string $relation
     * @return Relationship
     */
    public function setRelation($relation): Relationship
    {
        $this->relation = $relation;

        return $this;
    }

    /**
     * Get relation
     *
     * @return string
     */
    public function getRelation(): string
    {
        return $this->relation;
    }

    /**
     * @inheritDoc
     */
    public function fromArray(array $data): AbstractElement
    {
        if (!empty($data['relation'])) {
            $this->setRelation($data['relation']);
        }

        if (!empty($data['data'])) {
            $this->setData(Data::createFromArray($data['data']));
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $array = [];
        
        if (null !== $this->getLinks()) {
            $array[$this->getLinks()->getKey()] = $this->getLinks()->getValue();
        }

        if (null !== $this->getData()) {
            $array[$this->getData()->getKey()] = $this->getData()->getValue();
        }

        return $array;
    }
}
