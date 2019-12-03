<?php

namespace E7\JsonApi\Document;

/**
 * Class Meta
 * @package E7\JsonApi\Document
 */
class Meta extends Collection
{
    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'meta';
    }

    /**
     * @inheritDoc
     */
    public function fromArray(array $data): AbstractElement
    {
        foreach ($data as $key => $value) {
            $this->add(new KeyValue($key, $value));
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    protected function getElementKey(ElementInterface $element)
    {
        return $element->getKey();
    }

    /**
     * @inheritDoc
     */
    protected function accept(ElementInterface $element): bool
    {
        return $element instanceof KeyValue;
    }
}
