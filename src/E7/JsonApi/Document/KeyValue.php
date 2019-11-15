<?php

namespace E7\JsonApi\Document;

/**
 * Class KeyValue
 * @package E7\JsonApi\Document
 */
class KeyValue extends AbstractElement
{
    /** @var string */
    private $key;

    /** @var mixed */
    private $value;

    /**
     * Constructor
     *
     * @param string $key
     * @param mixed $value
     */
    public function __construct(string $key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * Set key
     *
     * @param string $key
     * @return KeyValue
     */
    public function setKey(string $key): KeyValue
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * Set value
     *
     * @param mixed $value
     * @return \E7\JsonApi\Document\KeyValue
     */
    public function setValue($value): KeyValue
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getValue()
    {
        return $this->value;
    }
}
