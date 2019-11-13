<?php

namespace E7\JsonApi\Request;

/**
 * Class Page
 * @package E7\JsonApi\Request
 */
class Page
{
    /** @var integer */
    private $number;

    /** @var integer */
    private $size;

    /** @var integer */
    private $offset;

    /** @var integer */
    private $limit;

    /** @var integer */
    private $cursor;

    /**
     * Page constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->setData($data);
    }

    /**
     * @param array $data
     * @return Page
     */
    public function setData(array $data)
    {
        foreach (['number', 'size', 'offset', 'limit', 'cursor'] as $key) {
            if (!empty($data[$key])) {
                $this->$key = (int)$data[$key];
            }
        }

        return $this;
    }

    /**
     * @param int $number
     * @return Page
     */
    public function setNumber($number): Page
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $size
     * @return Page
     */
    public function setSize($size): Page
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param int $offset
     * @return Page
     */
    public function setOffset($offset): Page
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param int $limit
     * @return Page
     */
    public function setLimit($limit): Page
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param int $cursor
     * @return Page
     */
    public function setCursor($cursor): Page
    {
        $this->cursor = $cursor;
        return $this;
    }

    /**
     * @return int
     */
    public function getCursor()
    {
        return $this->cursor;
    }
}
