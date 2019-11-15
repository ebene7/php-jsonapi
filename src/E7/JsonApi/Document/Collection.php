<?php

namespace E7\JsonApi\Document;

use ArrayIterator;
use Countable;
use InvalidArgumentException;
use IteratorAggregate;
use Traversable;

/**
 * class Collection
 * @package E7\JsonApi\Document
 */
abstract class Collection extends AbstractElement implements Countable, IteratorAggregate
{
    /** @var array */
    private $elements = [];

    /**
     * @param ElementInterface $element
     * @return Collection
     * @throws InvalidArgumentException
     */
    public function add(ElementInterface $element)
    {
        if (!$this->accept($element)) {
            throw new InvalidArgumentException(
                sprintf('The given element cannot be added (%s)', get_class($element))
            );
        }

        if (null !== ($key = $this->getElementKey($element))) {
            $this->elements[$key] = $element;
        } else {
            $this->elements[] = $element;
        }

        return $this;
    }

    /**
     * @return boolean
     */
    public function isEmpty(): bool
    {
        return epmty($this->elements);
    }

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        return count($this->elements);
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->elements);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $array = [];

        foreach ($this as $element) {
            $array[$element->getKey()] = $element->getValue();
        }

        return $array;
    }

    /**
     * Check, if the given element is accepted to be added
     *
     * @param ElementInterface $element
     * @return bool
     */
    protected function accept(ElementInterface $element): bool
    {
        return true;
    }

    /**
     * @param ElementInterface $element
     * @return null|string
     */
    protected function getElementKey(ElementInterface $element)
    {
        return null;
    }
}
