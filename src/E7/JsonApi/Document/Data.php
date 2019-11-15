<?php

namespace E7\JsonApi\Document;

/**
 * Class Data
 * @package E7\JsonApi\Document
 */
class Data extends AbstractResourceCollection
{
    /** @var boolean */
    private $forceArray;

    /**
     * Constructor
     *
     * @param boolean $forceArray
     */
    public function __construct(bool $forceArray = false)
    {
        $this->forceArray = $forceArray;
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'data';
    }
}
