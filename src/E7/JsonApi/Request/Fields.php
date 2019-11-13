<?php

namespace E7\JsonApi\Request;

/**
 * Class Fields
 * @package E7\JsonApi\Request
 */
class Fields
{
    const PARAM_NAME = 'fields';

    /** @var array */
    private $fields = [];

    /**
     * Constructor
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->setData($data);
    }

    /**
     * @param array $data
     * @return Fields
     */
    public function setData(array $data): Fields
    {
        foreach ($data as $context => $field) {
            $this->fields[$context] = array_map('trim', explode(',', $field));
        }

        return $this;
    }
}