<?php

namespace E7\JsonApi\Document\Factory;

use E7\JsonApi\Document\ElementInterface;
use InvalidArgumentException;

/**
 * Class Factory
 * @package E7\JsonApi\Document\Factory
 */
class Factory implements FactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createFromArray(string $class, array $data): ElementInterface
    {
        $class = $this->getMappedClass($class);
        
        $element = new $class();
        $element->fromArray($data);
        
        return $element;
    }
    
    /**
     * @inheritDoc
     */
    public function createOrUse(string $class, $data): ElementInterface
    {
        $class = $this->getMappedClass($class);
        
        if ($data instanceof $class) {
            return $data;
        }

        if (!is_array($data)) {
            throw new InvalidArgumentException('Parameter $data needs to ba an array.');
        }
        
        return $this->createFromArray($class, $data);
    }
    
    /**
     * @param string $class
     * @return string
     */
    protected function getMappedClass($class)
    {
        return $class;
    }
}
