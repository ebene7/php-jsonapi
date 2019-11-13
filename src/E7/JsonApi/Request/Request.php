<?php

namespace E7\JsonApi\Request;

/**
 * Class Request
 * @package E7\JsonApi\Request
 */
class Request 
{
    private $fields = [];

    /** @var Filters */
    private $filters;

    private $sort = [];

    private $includes = [];

    /** @var Page */
    private $page;

    /**
     * Constructor
     *
     * @param array $query
     * @param array $request
     * @param array $attributes
     * @param array $cookies
     * @param array $files
     * @param array $server
     * @param null  $content
     */
    public function __construct(
        array $query = [],
        array $request = [],
        array $attributes = [],
        array $cookies = [],
        array $files = [],
        array $server = [],
        $content = null
    ) {
        $this->init($query, $request, $attributes, $cookies, $files, $server , $content);
    }

    /**
     * @param array $query
     * @param array $request
     * @param array $attributes
     * @param array $cookies
     * @param array $files
     * @param array $server
     * @param null  $content
     */
    public function init(
        array $query = [],
        array $request = [],
        array $attributes = [],
        array $cookies = [],
        array $files = [],
        array $server = [],
        $content = null
    ) {
        $this->fields = new Fields(!empty($query[Fields::PARAM_NAME]) ? $query[Fields::PARAM_NAME] : []);
        $this->filters = new Filters(!empty($query[Filters::PARAM_NAME]) ? $query[Filters::PARAM_NAME] : []);
        $this->page = new Page(!empty($query['page']) ? $query['page'] : []);
        $this->sort = new Sort(!empty($query[Sort::PARAM_NAME]) ? $query[Sort::PARAM_NAME] : []);

        $this->initInclude($query);

//        print_r($server);
    }

    protected function initInclude(array $query)
    {
        if (empty($query['include'])) {
            return;
        }

        foreach (array_map('trim', explode(',', $query['include'])) as $include) {
            $this->includes[] = $include;
        }
    }

    /**
     * @return Request
     */
    public static function createFromGlobals()
    {
        $content = null;

        return new static($_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER, $content);
    }
}
