<?php

namespace E7\JsonApi\Document;

/**
 * Class Links
 * @package E7\JsonApi\Document
 */
class Links extends Collection
{
    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'links';
    }
}
