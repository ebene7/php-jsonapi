<?php

namespace E7\JsonApi\Document;

/**
 * Class Error
 * @package E7\JsonApi\Document
 */
class Error extends AbstractElement
{
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
     * a unique identifier for this particular occurrence of the problem
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
     * a links object containing the following members:
     * - about: a link that leads to further details about this particular 
     *   occurrence of the problem
     * @var Links 
     */
    private $links;

    /**
     * a meta object containing non-standard meta-information about the error
     * @var Meta 
     */
    private $meta;

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'error';
    }

    public function setId($id): Error
    {
        $this->id = $id;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setStatus($status): Error
    {
        $this->status = $status;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setCode($code): Error
    {
        $this->code = $code;

        return $this;
    }

    public function getCode() {
        return $this->code;
    }

    public function setTitle($title): Error
    {
        $this->title = $title;
        
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setDetail($detail): Error
    {
        $this->detail = $detail;

        return $this;
    }

    public function getDetail()
    {
        return $this->detail;
    }

    public function setLinks(Links $links): Error
    {
        $this->links = $links;

        return $this;
    }

    public function getLinks(): Links 
    {
        return $this->links;
    }

    public function setMeta(Meta $meta): Error
    {
        $this->meta = $meta;

        return $this;
    }

    public function getMeta(): Meta
    {
        return $this->meta;
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
            $array['links'] = $this->links->toArray();
        }

        if (null !== $this->meta) {
            $array['meta'] = $this->meta->toArray();
        }

        return $array;
    }
}
