<?php

namespace E7\JsonApi\Document;

use E7\JsonApi\Document\Traits\FactoryTrait;

/**
 * Class AbstractElement
 * @package E7\JsonApi\Document
 */
abstract class AbstractElement implements ElementInterface
{
    use FactoryTrait;

    /**
     * @inheritDoc
     */
    public function getValue()
    {
        return $this->toArray();
    }

    /**
     * @param array $data
     * @return AbstractElement
     */
    public function fromArray(array $data): AbstractElement
    {
        foreach ($data as $key => $value) {
            $setter = 'set' . $key;
            if (!method_exists($this, $setter)) {
                continue;
            }
            call_user_func([$this, $setter], $value);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
