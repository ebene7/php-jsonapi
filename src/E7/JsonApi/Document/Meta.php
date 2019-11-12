<?php

namespace E7\JsonApi\Document;

/**
 * Class Meta
 * @package E7\JsonApi\Document
 */
class Meta extends Collection
{
    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'meta';
    }
}
