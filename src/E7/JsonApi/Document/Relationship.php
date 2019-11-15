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
    public function __construct(string $relation = null, Data $data = null, Links $links = null)
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
     * Set data
     *
     * @param Data $data
     * @return Relationship
     */
    public function setData(Data $data): Relationship
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return Data
     */
    public function getData(): Data
    {
        return $this->data;
    }

    /**
     * Set links
     *
     * @param Links $links
     * @return Relationship
     */
    public function setLinks(Links $links): Relationship
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
        if (!empty($data['relation'])) {
            $this->setRelation($data['relation']);
        }

        if (!empty($data['data'])) {
            $dataElement = new Data();
            $dataElement->fromArray($data['data']);
            $this->setData($dataElement);
        }

        return $this;
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
