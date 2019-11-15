<?php

namespace E7\JsonApi\Document;


/**
 * Class Document
 * @package E7\JsonApi\Document
 */
class Document extends AbstractElement
{
    /**
     * an object describing the server’s implementation
     * @var JsonApi 
     */
    private $jsonApi;
    
    /**
     * the document’s 'primary data'
     * @var Data 
     */
    private $data;
    
    /**
     * an array of error objects
     * @var Errors
     */
    private $errors;
    
    /**
     * a meta object that contains non-standard meta-information
     * @var Meta
     */
    private $meta;
    
    /**
     * a links object related to the primary data
     * @var Links
     */
    private $links;
    
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
        $this->data = $data;
        $this->errors = $errors;
        $this->meta = $meta;
        $this->links = $links;
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
     * Set data
     * 
     * @param Data $data
     * @return Document
     */
    public function setData(Data $data): Document
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Get data
     * 
     * @return Data|null
     */
    public function getData(): Data
    {
        return $this->data;
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
     * Set meta
     * 
     * @param Meta $meta
     * @return Document
     */
    public function setMeta(Meta $meta): Document
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * Get meta
     * 
     * @return Meta|null
     */
    public function getMeta(): Meta
    {
        return $this->meta;
    }

    /**
     * Set links
     *
     * @param Links $links
     * @return Document
     */
    public function setLinks(Links $links): Document
    {
        $this->links = $links;

        return $this;
    }

    /**
     * Get links
     *
     * @return Links|null
     */
    public function getLinks()
    {
        return $this->links;
    }

    public function addLink($relation, string $url = null, Meta $meta = null)
    {
        if (is_string($relation) && !empty($url)) {
            // @TODO: extend factory
            $relation = new Link($relation, $url, $meta);
        }

        if (!$relation instanceof Link) {
            throw new \InvalidArgumentException('');
        }

        if (null === $this->getLinks()) {
            // @TODO: use factory
            $this->setLinks(new Links());
        }

        $this->getLinks()->add($relation);

        return $this;
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
