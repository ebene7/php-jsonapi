<?php

namespace E7\JsonApi\Document;

/**
 * Class Data
 * @package E7\JsonApi\Document
 */
class Data extends Collection
{
    /** @var boolean */
    private $forceArray;

    /**
     * Constructor
     *
     * @param boolean $forceArray
     */
    public function __construct(bool $forceArray = false)
    {
        $this->forceArray = $forceArray;
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'data';
    }

    /**
     * @inheritDoc
     */
    public function fromArray(array $data): AbstractElement
    {
        if (array_key_exists('type', $data)) {
            return $this->fromArray([$data]);
        }

        foreach ($data as $index => $item) {
            $resource = new Resource();
            $resource->fromArray($item);
            $this->add($resource);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $array = [];

        foreach ($this as $element) {
            $array[] = $element->getValue();
        }

        return $array;
    }
}
