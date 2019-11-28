<?php

namespace E7\JsonApi\Document;

use E7\JsonApi\Document\Traits\MetaAwareTrait;

/**
 * Class Link
 * @package E7\JsonApi\Document
 */
class Link extends AbstractElement
{
    use MetaAwareTrait;

    const REL_FIRST = 'first';
    const REL_LAST = 'last';
    const REL_NEXT = 'next';
    const REL_PREV = 'prev';
    const REL_RELATED = 'related';
    const REL_SELF = 'self';
    
    /** @var string */
    private $relation;

    /** @var string */
    private $url;

    /**
     * Constructor
     * 
     * @param string $relation
     * @param string $url
     * @param type $meta
     */
    public function __construct(string $relation = null, string $url = null, Meta $meta = null)
    {
        $this->relation = $relation;
        $this->url = $url;
        $this->meta = $meta;
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return $this->relation;
    }

    /**
     * @inheritDoc
     */
    public function getValue()
    {
        return $this->hasMeta() ? $this->toArray() : $this->url;
    }

    /**
     * Set relation
     *
     * @param string $relation
     * @return Link
     */
    public function setRelation(string $relation): Link
    {
        $this->relation = $relation;

        return $this;
    }

    /**
     * Get relation
     *
     * @return string
     */
    public function getRelation(): string
    {
        return $this->relation;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Link
     */
    public function setUrl(string $url): Link
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @inheritDoc
     */
    public function fromArray(array $data): AbstractElement
    {
        if (!empty($data['relation'])) {
            $this->setRelation($data['relation']);
        }

        if (!empty($data['url'])) {
            $this->setUrl($data['url']);
        }

        if (!empty($data['meta'])) {
            $meta = new Meta();
            $meta->fromArray($data['meta']);
            $this->setMeta($meta);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'href' => $this->url,
            'meta' => $this->hasMeta() ? $this->meta->getValue() : [],
        ];
    }

    /**
     * @return boolean
     */
    public function hasMeta(): bool
    {
        return null !== $this->meta;
    }
}
