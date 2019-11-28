<?php

namespace E7\JsonApi\Document\Traits;

use E7\JsonApi\Document\Document;
use E7\JsonApi\Document\Link;
use E7\JsonApi\Document\Links;
use E7\JsonApi\Document\Meta;

/**
 * Trait LinksAwareTrait
 * @package E7\JsonApi\Document\Traits
 */
trait LinksAwareTrait
{
    /**
     * a links object related to the primary data
     * @var Links
     */
    private $links;

    /**
     * Set links
     *
     * @param Links $links
     * @return $this
     */
    public function setLinks(Links $links = null)
    {
        $this->links = $links;

        return $this;
    }

    /**
     * Get links
     *
     * @return Links|null
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param             $relation
     * @param string|null $url
     * @param Meta|null   $meta
     * @return $this
     */
    public function addLink($relation, string $url = null, Meta $meta = null)
    {
        if (is_string($relation) && !empty($url)) {
            // @TODO: extend factory
            $relation = new Link($relation, $url, $meta);
        }

        if (!$relation instanceof Link) {
            throw new \InvalidArgumentException('');
        }

        if (null === $this->getLinks()) {
            // @TODO: use factory
            $this->setLinks(new Links());
        }

        $this->getLinks()->add($relation);

        return $this;
    }
}