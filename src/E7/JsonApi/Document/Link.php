<?php

namespace E7\JsonApi\Document;

/**
 * Class Link
 * @package E7\JsonApi\Document
 */
class Link extends AbstractElement
{
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
    
    /** @var Meta */
    private $meta;
    
    /**
     * Constructor
     * 
     * @param string $relation
     * @param string $url
     * @param type $meta
     */
    public function __construct(string $relation, string $url, Meta $meta = null)
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
