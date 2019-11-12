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
}
