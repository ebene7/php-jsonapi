<?php

namespace E7\JsonApi\Document;

/**
 * Class JsonApi
 * @package E7\JsonApi\Document
 */
class JsonApi extends AbstractElement
{
    const VERSION_1_0 = '1.0';
    const VERSION_1_1 = '1.1';
    
    /** @var array */
    private $versions = [
        self::VERSION_1_0,
        self::VERSION_1_1,
    ];
    
    /** @var string */
    private $version;
    
    /**
     * Constructor
     *
     * @param string $version
     */
    public function __construct(string $version = self::VERSION_1_0)
    {
        $this->version = $version;
    }
    
    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'jsonapi';
    }

    /**
     * Set version
     *
     * @param string $version
     * @return JsonApi
     */
    public function setVersion($version): JsonApi
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get Version
     *
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @inheritDoc
     */
    public function fromArray(array $data): AbstractElement
    {
        if (!empty($data['version'])) {
            $this->setVersion($data['version']);
        }

        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'version' => $this->version,
        ];
    }
}
