<?php

require_once __DIR__ . '/../vendor/autoload.php';

use E7\JsonApi\Document\Document;
use E7\JsonApi\Document\Link;
use E7\JsonApi\Document\Links;
use E7\JsonApi\Document\Error;
use E7\JsonApi\Document\Errors;
use E7\JsonApi\Document\Resource;
use E7\JsonApi\Document\Attributes;
use E7\JsonApi\Document\KeyValue;
use E7\JsonApi\Document\Relationships;
use E7\JsonApi\Document\Relationship;
use E7\JsonApi\Document\Data;
use E7\JsonApi\Document\JsonApi;
use E7\JsonApi\Document\Meta;
use E7\JsonApi\Request\Request;
use PHPUnit\TextUI\ResultPrinter;

//$attr = new Attributes();
//$attr->add(new KeyValue('answer', 42));
//$attr->add(new KeyValue('foo', 'bar'));
//
//
//$links = new Links();
//$links->add(new Link(Link::REL_FIRST, 'https://www.example.com/first'));
//$links->add(new Link(Link::REL_LAST, 'https://www.example.com/last'));
//
//$rel = new Relationships();
//$rel->add(new Relationship('chef', new Data(), new Links()));
//
//$element = new Resource('person', 123, $attr, $rel, $links);
//
//echo get_class($element) . ' # ' . json_encode($element);

//$doc = new Document();
//$meta = new Meta();
//$meta->add(new KeyValue('fooo', 'baar'));
//$errors = new Errors();
//$errors->add((new Error())->setTitle('Doofer Fehler'));
//
//$doc->setData(new Data())
//        ->setJsonApi(new JsonApi())
//        ->setIncluded(new E7\JsonApi\Document\Included())
//        ->setLinks(new Links())
//        ->setMeta($meta)
//        ->setErrors($errors);
//
//        ;
//echo "\n\n\n" . get_class($doc) . ' # ' . json_encode($doc) . "\n\n\n";


$request = Request::createFromGlobals();

//print_r($request);

