<?php

namespace E7\JsonApi\Document\Traits;

use E7\JsonApi\Document\Data;

/**
 * Trait DataAwareTrait
 * @package E7\JsonApi\Document\Traits
 */
trait DataAwareTrait
{
    /**
     * the document’s 'primary data'
     * @var Data
     */
    private $data;

    /**
     * Set data
     *
     * @param Data $data
     * @return Document
     */
    public function setData(Data $data = null)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Get data
     *
     * @return Data|null
     */
    public function getData(): Data
    {
        return $this->data;
    }
}