<?php

namespace E7\JsonApi\Document;

/**
 * Class AbstractElement
 * @package E7\JsonApi\Document
 */
abstract class AbstractElement implements ElementInterface
{
    /**
     * @inheritDoc
     */
    public function getValue()
    {
        return $this->toArray();
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
