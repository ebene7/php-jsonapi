<?php

namespace E7\JsonApi\Document;

/**
 * Class Attributes
 * @package E7\JsonApi\Document
 */
class Attributes extends Collection
{
    /** @var array */
    private $exposedKeys = [];

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'attributes';
    }

    /**
     * Set exposed keys
     *
     * @param string[] $exposedKeys
     * @return Attributes
     */
    public function setExposedKeys(array $exposedKeys): Attributes
    {
        $this->exposedKeys = array_map('strtolower', $exposedKeys);

        return $this;
    }

    /**
     * Get exposed keys
     *
     * @return array
     */
    public function getExposedKeys(): array
    {
        return $this->exposedKeys;
    }

    /**
     * @param string $key
     * @return Attributes
     */
    public function addExposedKey(string $key): Attributes
    {
        $this->exposedKeys[] = strtolower($key);

        return $this;
    }

    /**
     * Check, if the key is set to be exposed
     *
     * @param string $key
     * @return bool Returns true, if no keys are specified to be exposed or if the keys matches
     */
    public function isExposedKey(string $key): bool
    {
        return empty($this->exposedKeys) || in_array(strtolower($key), $this->exposedKeys);
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
    public function toArray(): array
    {
        $array = [];

        foreach ($this as $element) {
            if (!$this->isExposedKey($element->getKey())) {
                continue;
            }
            $array[$element->getKey()] = $element->getValue();
        }

        return $array;
    }
}
