<?php

namespace E7\JsonApi\Request;

/**
 * Class Content
 * @package E7\JsonApi\Request
 */
class Content
{
    private $raw;
    
    /**
     * Constructor
     * 
     * @param string $raw
     */
    public function __construct(string $raw = null) 
    {
        $this->setValue($raw);
    }
    
    /**
     * @param string $raw
     * @return Content
     */
    public function setValue(string $raw = null): Content
    {
        $this->raw = $raw;
        
        return $this;
    }
}
