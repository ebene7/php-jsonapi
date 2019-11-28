<?php

namespace E7\JsonApi\Document\Error;

use E7\JsonApi\Document\AbstractElement;

/**
 * Class Source
 * @package E7\JsonApi\Document\Error
 */
class Source extends AbstractElement
{
    /** @var string */
    private $pointer;
    
    /** @var string */
    private $parameter;

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'source';
    }

    /**
     * Set pointer
     *
     * @param string $pointer
     * @return Source
     */
    public function setPointer($pointer): Source
    {
        $this->pointer = $pointer;

        return $this;
    }

    /**
     * Get pointer
     *
     * @return string
     */
    public function getPointer(): string
    {
        return $this->pointer;
    }

    /**
     * Set parameter
     *
     * @param type $parameter
     * @return $this
     */
    public function setParameter($parameter): Source
    {
        $this->parameter = $parameter;

        return $this;
    }

    /**
     * Get parameter
     *
     * @return string
     */
    public function getParameter(): string
    {
        return (string)$this->parameter;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $array = [];
        
        if (null !== $this->getPointer()) {
            $array['pointer'] = $this->getPointer();
        }
        
        if (!empty($this->getParameter())) {
            $array['parameter'] = $this->getParameter();
        }
        
        return $array;
    }
}
