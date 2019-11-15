<?php

namespace E7\JsonApi\Document\Traits;

use E7\JsonApi\Document\ElementInterface;
use E7\JsonApi\Document\Factory\Factory;
use E7\JsonApi\Document\Factory\FactoryInterface;

/**
 * Trait FactoryTrait
 * @package E7\JsonApi\Document\Traits
 */
trait FactoryTrait
{
    /** @var FactoryInterface */
    private static $factory;

    /**
     * Set factory
     *
     * @param FactoryInterface $factory
     * @return void
     */
    public static function setFactory(FactoryInterface $factory)
    {
        self::$factory = $factory;
    }

    /**
     * Get factory
     *
     * @return FactoryInterface
     */
    protected static function getFactory()
    {
        if (null === self::$factory) {
            self::$factory = new Factory();
        }

        return self::$factory;
    }
    
    /**
     * Factory
     *
     * @param array $data
     * @return ElementInterface
     */
    public static function createFromArray(array $data): ElementInterface
    {
        return self::getFactory()->createFromArray(get_called_class(), $data);
    }
    
    /**
     * Factory
     *
     * @param string $json
     * @return ElementInterface
     */
    public static function createFromJson(string $json): ElementInterface
    {
        return self::createFromArray(json_decode($json, true));
    }

    /**
     * Factory delegation
     *
     * @see FactoryInterface::createOrPassElement()
     */
    protected function createOrPassElement(string $class, $data): ElementInterface
    {
        return self::getFactory()->createOrPassElement($class, $data);
    }
}
