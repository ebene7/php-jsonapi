<?php

namespace E7\JsonApi\Document;

/**
 * Class ResourceIdentifier
 * @package E7\JsonApi\Document
 */
class ResourceIdentifier extends AbstractElement
{
    /** @var string */
    private $type;
    
    /** @var string */
    private $id;
    
    /**
     * Constructor
     *
     * @param string $type
     * @param string $id
     */
    public function __construct($type = null, $id = null)
    {
        $this->type = $type;
        $this->id = $id;
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'resourceidentifier';
    }

    /**
     * Set type
     * 
     * @param string $type
     * @return ResourceIdentifier
     */
    public function setType(string $type): ResourceIdentifier
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     * 
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set id
     * 
     * @param string $id
     * @return ResourceIdentifier
     */
    public function setId($id): ResourceIdentifier
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function fromArray(array $data): AbstractElement
    {
        if (!empty($data['type'])) {
            $this->setType($data['type']);
        }
        
        if (!empty($data['id'])) {
            $this->setId($data['id']);
        }
        
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray():array
    {
        $data = [];

        if (null !== $this->type) {
            $data['type'] = $this->type;
        }

        if (null !== $this->id) {
            $data['id'] = $this->id;
        }

        return $data;
    }
}
