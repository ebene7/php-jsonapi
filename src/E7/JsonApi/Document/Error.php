<?php

namespace E7\JsonApi\Document;

use E7\JsonApi\Document\Error\Source;
use E7\JsonApi\Document\Traits\LinksAwareTrait;
use E7\JsonApi\Document\Traits\MetaAwareTrait;

/**
 * Class Error
 * @package E7\JsonApi\Document
 */
class Error extends AbstractElement
{
    use LinksAwareTrait;
    use MetaAwareTrait;

    /**
     * a unique identifier for this particular occurrence of the problem
     * @var string 
     */
    private $id;

    /**
     * the HTTP status code applicable to this problem, expressed as a string value
     * @var integer
     */
    private $status;

    /**
     * an application-specific error code, expressed as a string value
     * @var string
     */
    private $code;

    /**
     * a short, human-readable summary of the problem that SHOULD NOT change 
     * from occurrence to occurrence of the problem, except for purposes of 
     * localization
     * @var string 
     */
    private $title;

    /**
     * a human-readable explanation specific to this occurrence of the problem. 
     * Like 'title', this field’s value can be localized
     * @var string 
     */
    private $detail;

    /**
     * an object containing references to the source of the error, optionally
     * including any of the following members:
     * - pointer: a JSON Pointer [RFC6901] to the associated entity in the request
     *   document [e.g. "/data" for a primary data object, or "/data/attributes/title"
     *   for a specific attribute].
     * - parameter: a string indicating which URI query parameter caused the error
     * @var Source
     */
    private $source;

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'error';
    }

    /**
     * Set id
     *
     * @param string $id
     * @return Error
     */
    public function setId(string $id): Error
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set HTTP status
     *
     * @param integer $status
     * @return Error
     */
    public function setStatus($status): Error
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get HTTP status
     *
     * @return integer
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Error
     */
    public function setCode($code): Error
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Error
     */
    public function setTitle(string $title): Error
    {
        $this->title = $title;
        
        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set detail
     *
     * @param string $detail
     * @return \E7\JsonApi\Document\Error
     */
    public function setDetail(string $detail): Error
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string
     */
    public function getDetail(): string
    {
        return $this->detail;
    }

    /**
     * Set Source
     *
     * @param Source $source
     * @return Error
     */
    public function setSource(Source $source): Error
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return Source
     */
    public function getSource(): Source
    {
        return $this->source;
    }

    /**
     * @inheritDoc
     */
    public function fromArray(array $data): AbstractElement
    {
        if (!empty($data['links'])) {
            $this->setLinks($this->createOrPassElement(Links::class, $data['links']));
            unset($data['links']);
        }

        if (!empty($data['meta'])) {
            $this->setMeta($this->createOrPassElement(Meta::class, $data['meta']));
            unset($data['meta']);
        }

        if (!empty($data['source'])) {
            $this->setSource($this->createOrPassElement(Source::class, $data['source']));
            unset($data['source']);
        }

        return parent::fromArray($data);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $array = [];

        if (null !== $this->id) {
            $array['id'] = $this->id;
        }

        if (null !== $this->status) {
            $array['status'] = $this->status;
        }

        if (null !== $this->code) {
            $array['code'] = $this->code;
        }

        if (null !== $this->title) {
            $array['title'] = $this->title;
        }

        if (null !== $this->detail) {
            $array['detail'] = $this->detail;
        }

        if (null !== $this->links) {
            $array['links'] = $this->links->getValue();
        }

        if (null !== $this->meta) {
            $array['meta'] = $this->meta->getValue();
        }

        if (null !== $this->source) {
            $array['source'] = $this->source->getValue();
        }

        return $array;
    }
}
