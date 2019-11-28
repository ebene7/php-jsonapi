<?php

namespace E7\JsonApi\Document;

/**
 * Class DocumentTest
 * @package E7\JsonApi\Document
 */
class DocumentTest extends ElementTestCase
{
//    public function testFromOop()
//    {
//        $document = new Document();
//
//        $document
//            ->addJsonApiHeader()
//            ->addLink('self', 'https://www.example.com/self')
//            ->addLink('next', 'https://www.example.com/next');
//
////        print_r($document);
////        print_r(json_encode($document));
//    }
    
    public function testFromArrayWithData()
    {
        $this->assertTrue(true);

        $data = [
            'jsonapi' => [
                'version' => '1.1',
            ],
            'links' => [
                'self' => 'https://www.example.com/self',
                'next' => 'https://www.example.com/next',
                'last' => [
                    'href' => 'https://www.example.com/last',
                    'meta' => [
                        'count' => 23,
                    ]
                ]
            ],
            'data' => [
                [
                    'type' => 'awesome-type',
                    'id' => 42,
                    'attributes' => [
                        'foo' => 'bar',
                        'bamm' => 'bazz',
                    ],
                ],
                [
                    'type' => 'awesome-type',
                    'id' => 43,
                    'attributes' => [
                        'foo' => 'bar2',
                        'bamm' => 'bazz2',
                    ],
                ],
            ],
            'included' => [
                [
                    'type' => 'people',
                    'id' => 9,
                    'attributes' => [
                        'firstName' => 'Dan',
                        'lastName' => 'Gebhardt'
                    ]
                ],
                [
                    'type' => 'comments',
                    'id' => 5,
                    'attributes' => [
                        'body' => 'First!',
                    ],
                    'relationships' => [
                        'author' => [
                            'data' => [
                                'type' => 'people',
                                'id' => 9,
                            ],
                        ],
                        'images' => [
                            'data' => [
                                [
                                    'type' => 'images',
                                    'id' => '1',
                                ],
                                [
                                    'type' => 'images',
                                    'id' => '2',
                                ],
                            ]
                        ]
                    ]
                ],
            ],
            'errors' => [
                [
                    'status' => 403,
                    'source' => [
                        'pointer' => '/bal/blubb/bazz.php',
                    ],
                    'detail' => 'Editing secret powers is not authorized on Sundays.',
                ],
                [
                    'id' => 'error id',
                    'code' => 1234,
                    'links' => [
                        'info' => 'https://www.example.com/info',
                    ],
                    'status' => 422,
                    'source' => [
                        'pointer' => '/data/attributes/volume',
                        'parameter' => 'foo-bah-param',
                    ],
                    'title' => 'awesome title',
                    'detail' => 'Volume does not, in fact, go to 11.',
                    'meta' => [
                        'some-key' => 'some-value',
                    ]
                ],
            ],
            'meta' => [
                'serverTime' => date('h:i:s'),
            ]
        ];
        
        $element = new Document();
        $element->fromArray($data);

//        print_r($element);
        print_r($element->toArray());
        print_r(json_encode($element));
        
        
    }
}
