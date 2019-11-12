<?php

namespace E7\JsonApi\Document;

use JsonSerializable;

/**
 * Interface ElementInterface
 * @package E7\JsonApi\Document
 */
interface ElementInterface extends JsonSerializable
{
    /**
     * @return string
     */
    public function getKey(): string;
    
    /**
     * @return array|string
     */
    public function getValue();
    
    /**
     * @return array
     */
    public function toArray(): array;
}
