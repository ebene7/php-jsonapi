<?php

namespace E7\JsonApi\Document;

/**
 * Class Errors
 * @package E7\JsonApi\Document
 */
class Errors extends Collection
{
    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'errors';
    }

    /**
     * @inheritDoc
     */
    public function fromArray(array $data): AbstractElement
    {
        // @TODO: Add checks!
        foreach ($data as $item) {
            $this->add($this->createOrPassElement(Error::class, $item));
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
