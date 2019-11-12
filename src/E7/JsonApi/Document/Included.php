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
}
