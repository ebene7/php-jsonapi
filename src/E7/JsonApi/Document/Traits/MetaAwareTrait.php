<?php

namespace E7\JsonApi\Document\Traits;

use E7\JsonApi\Document\Meta;

/**
 * Trait MetaAwareTrait
 * @package E7\JsonApi\Document\Traits
 */
trait MetaAwareTrait
{
    /**
     * a meta object that contains non-standard meta-information
     * @var Meta
     */
    private $meta;

    /**
     * Set meta
     *
     * @param Meta $meta
     * @return $this
     */
    public function setMeta(Meta $meta = null)
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * Get meta
     *
     * @return Meta|null
     */
    public function getMeta(): Meta
    {
        return $this->meta;
    }

    /**
     * @return bool
     */
    public function hasMeta()
    {
        return null !== $this->meta;
    }
}