<?php

namespace E7\JsonApi\Document\Factory;

use E7\JsonApi\Document\ElementInterface;

/**
 * Interface FactoryInterface
 * @package E7\JsonApi\Document\Factory
 */
interface FactoryInterface
{
    /**
     * @param string $class
     * @param array $data
     * @return ElementInterface
     */
    public function createFromArray(string $class, array $data): ElementInterface;
    
    /**
     * @param string $class
     * @param type $data
     * @return ElementInterface
     * @throws InvalidArgumentException
     */
    public function createOrPassElement(string $class, $data): ElementInterface;
}
