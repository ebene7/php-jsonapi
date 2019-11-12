<?php

namespace E7\JsonApi\Document;

/**
 * Class Attributes
 * @package E7\JsonApi\Document
 */
class Attributes extends Collection
{
    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'attributes';
    }
}
