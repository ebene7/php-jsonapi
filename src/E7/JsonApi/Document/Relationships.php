<?php

namespace E7\JsonApi\Document;

/**
 * Class Relations
 * @package E7\JsonApi\Document
 */
class Relationships extends Collection
{
    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'relationships';
    }

    /**
     * @inheritDoc
     */
    public function fromArray(array $data): AbstractElement
    {
        foreach ($data as $key => $value) {
            $relation = new Relationship($key);
            $relation->fromArray($value);
            $this->add($relation);
        }

        return $this;
    }
}
