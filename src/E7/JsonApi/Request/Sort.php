<?php

namespace E7\JsonApi\Request;

use E7\JsonApi\Request\Sort\Field;

/**
 * Class Sort
 * @package E7\JsonApi\Request
 */
class Sort
{
    const PARAM_NAME = 'sort';

    /** @var array */
    private $fields = [];

    /**
     * Constructor
     *
     * @param array|string $data
     */
    public function __construct($data)
    {
        if (!is_array($data)) {
            $data = array_map('trim', explode(',', $data));
        }
        $this->setData($data);
    }

    /**
     * @param array $data
     * @return Sort
     */
    public function setData(array $data): Sort
    {
        foreach ($data as $sortField) {
            $field = Field::createFromString($sortField);
            $this->fields[$field->getName()] = $field;
        }

        return $this;
    }
}