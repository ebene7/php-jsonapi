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

    /**
     * @inheritDoc
     */
    public function fromArray(array $data): AbstractElement
    {
        // @TODO: Add checks!
        foreach ($data as $relation => $value) {
            if (is_string($value)) {
                $link = new Link($relation, $value);
            } else {
                $link = new Link($relation, $value['href']);
                $link->fromArray(['meta' => $value['meta']]);
            }
            $this->add($link);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    protected function accept(ElementInterface $element): bool
    {
        return $element instanceof Link;
    }

    /**
     * @inheritDoc
     */
    protected function getElementKey(ElementInterface $element)
    {
        return $element->getRelation();
    }
}
