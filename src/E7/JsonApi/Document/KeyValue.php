<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
     * @inheritDoc
     */
    public function getKey(): string
    {
        return $this->key;
    }
    
    /**
     * @inheritDoc
     */
    public function getValue()
    {
        return $this->value;
    }
}
