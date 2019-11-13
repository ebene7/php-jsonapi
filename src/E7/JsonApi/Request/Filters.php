<?php

namespace E7\JsonApi\Request;

/**
 * Class Filters
 * @package E7\JsonApi\Request
 */
class Filters
{
    const PARAM_NAME = 'filter';

    /** @var array */
    private $filters = [];

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
     * @return Filters
     */
    public function setData(array $data = []): Filters
    {

    print_r($data);
        foreach ($data as $field => $values) {
            $this->filters[$field] = array_map('trim', explode(',', $values));
        }

        return $this;
    }
}