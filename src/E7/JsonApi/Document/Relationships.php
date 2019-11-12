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
}
