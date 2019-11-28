<?php

namespace E7\JsonApi\Document;

use E7\JsonApi\Document\Traits\DataAwareTrait;
use E7\JsonApi\Document\Traits\LinksAwareTrait;
use E7\JsonApi\Document\Traits\MetaAwareTrait;

/**
 * Class Document
 * @package E7\JsonApi\Document
 */
class Document extends AbstractElement
{
    use DataAwareTrait;
    use LinksAwareTrait;
    use MetaAwareTrait;

    /**
     * an object describing the server’s implementation
     * @var JsonApi 
     */
    private $jsonApi;

    /**
     * an array of error objects
     * @var Errors
     */
    private $errors;
    
    /**
     * an array of resource objects that are related to the primary data and/or 
     * each other ('included resources')
     * @var Included 
     */
    private $included;
    
    /**
     * Constructor
     * 
     * @param \E7\JsonApi\Document\Data $data
     * @param \E7\JsonApi\Document\Errors $errors
     * @param \E7\JsonApi\Document\Meta $meta
     * @param \E7\JsonApi\Document\Links $links
     * @param \E7\JsonApi\Document\Included $included
     * @param \E7\JsonApi\Document\JsonApi $jsonApi
     */
    public function __construct(
        Data $data = null,
        Errors $errors = null,
        Meta $meta = null,
        Links $links = null,
        Included $included = null,
        JsonApi $jsonApi = null
    ) {
        $this->setData($data);
        $this->errors = $errors;
        $this->setMeta($meta);
        $this->setLinks($links);
        $this->included = $included;
        $this->jsonApi = $jsonApi;
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'document';
    }



    /**
     * Set errors
     * 
     * @param Errors $errors
     * @return Document
     */
    public function setErrors(Errors $errors): Document
    {
        $this->errors = $errors;
        return $this;
    }
    
    /**
     * Get errors
     * 
     * @return Errors|null
     */
    public function getErrors(): Errors
    {
        return $this->errors;
    }

    /**
     * Set included
     * 
     * @param Included $included
     * @return Document
     */
    public function setIncluded(Included $included): Document
    {
        $this->included = $included;

        return $this;
    }

    /**
     * Get included
     * 
     * @return Included|null
     */
    public function getIncluded(): Included
    {
        return $this->included;
    }

    /**
     * Get jsonapi
     * 
     * @param JsonApi $jsonApi
     * @return Document
     */
    public function setJsonApi(JsonApi $jsonApi): Document
    {
        $this->jsonApi = $jsonApi;

        return $this;
    }
    
    /**
     * Get jsonapi
     * @return JsonApi|null
     */
    public function getJsonApi(): JsonApi
    {
        return $this->jsonApi;
    }

    /**
     * Add JSON:API header
     *
     * @param string $version
     * @return Document
     */
    public function addJsonApiHeader(string $version = null): Document
    {
        $version = $version ?: JsonApi::VERSION_1_0;
        $jsonApi = JsonApi::createFromArray(['version' => $version]);
        return $this->setJsonApi($jsonApi);
    }

    /**
     * @inheritDoc
     */
    public function fromArray(array $data): AbstractElement
    {
        if (!empty($data['jsonapi'])) {
            $this->setJsonApi($this->createOrPassElement(JsonApi::class, $data['jsonapi']));
        }

        if (!empty($data['data'])) {
            $this->setData($this->createOrPassElement(Data::class, $data['data']));
        }

        if (!empty($data['errors'])) {
            $this->setErrors($this->createOrPassElement(Errors::class, $data['errors']));
        }

        if (!empty($data['included'])) {
            $this->setIncluded($this->createOrPassElement(Included::class, $data['included']));
        }

        if (!empty($data['links'])) {
            $this->setLinks($this->createOrPassElement(Links::class, $data['links']));
        }

        if (!empty($data['meta'])) {
            $this->setMeta($this->createOrPassElement(Meta::class, $data['meta']));
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $array = [];
        
        if (null !== $this->jsonApi) {
            $array[$this->jsonApi->getKey()] = $this->jsonApi->getValue();
        }
        
        if (null !== $this->links) {
            $array[$this->links->getKey()] = $this->links->getValue();
        }
        
        if (null !== $this->data) {
            $array[$this->data->getKey()] = $this->data->getValue();
        }
        
        if (null !== $this->included) {
            $array[$this->included->getKey()] = $this->included->getValue();
        }
        
        if (null !== $this->meta) {
            $array[$this->meta->getKey()] = $this->meta->getValue();
        }
        
        if (null !== $this->errors) {
            $array[$this->errors->getKey()] = $this->errors->getValue();
        }
        
        return $array;
    }
    
    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return (object) parent::jsonSerialize();
    }
}
