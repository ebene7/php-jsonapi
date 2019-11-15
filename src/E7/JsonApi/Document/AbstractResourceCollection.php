<?php

namespace E7\JsonApi\Document;

/**
 * Class AbstractResourceCollection
 * @package E7\JsonApi\Document
 */
abstract class AbstractResourceCollection extends Collection
{
    /**
     * @inheritDoc
     */
    public function fromArray(array $data): AbstractElement
    {
        if (array_key_exists('type', $data)) {
            return $this->fromArray([$data]);
        }

        foreach ($data as $index => $item) {
            $this->add($this->createOrPassElement(Resource::class, $item));
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $array = [];

        foreach ($this as $element) {
            $array[] = $element->getValue();
        }

        return $array;
    }

    /**
     * @inheritDoc
     */
    protected function accept(ElementInterface $element): bool
    {
        return $element instanceof Resource;
    }

    /**
     * @inheritDoc
     */
    protected function getElementKey(ElementInterface $element)
    {
        return sprintf("%s-%s", $element->getType(), $element->getId());
    }
}
