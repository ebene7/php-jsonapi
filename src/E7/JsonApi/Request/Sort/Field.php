<?php

namespace E7\JsonApi\Request\Sort;

/**
 * Class Field
 * @package E7\JsonApi\Request\Sort
 */
class Field
{
    const ASC = 'asc';
    const DESC = 'desc';

    /** @var string */
    private $name;

    /** @var string */
    private $order;

    /**
     * Constructor
     *
     * @param string $name
     * @param string $order
     */
    public function __construct(string $name, string $order = null)
    {
        $this->name = $name;
        $this->order = $order ?: self::ASC;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf("%s %s", $this->getName(), $this->getOrder());
    }

    /**
     * @param string $name
     * @return Field
     */
    public function setName($name): Field
    {
        $this->name = $name;

        return $this;
    }
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $order
     * @return Field
     */
    public function setOrder($order): Field
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Factory
     *
     * @param string $field
     * @return Field
     */
    public static function createFromString(string $field): Field
    {
        if ('-' == substr($field,0,1)) {
            return new static(substr($field, 1), self::DESC);
        }

        return new static($field);
    }
}