<?php

namespace E7\JsonApi\Document;

/**
 * Class Included
 * @package E7\JsonApi\Document
 */
class Included extends Collection
{
    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'included';
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
