<?php

namespace E7\JsonApi\Document;

/**
 * Class Included
 * @package E7\JsonApi\Document
 */
class Included extends AbstractResourceCollection
{
    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'included';
    }
}
