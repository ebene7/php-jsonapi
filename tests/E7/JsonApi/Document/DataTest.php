<?php

namespace E7\JsonApi\Document;

/**
 * Class DataTest
 * @package E7\JsonApi\Document
 */
class DataTest extends CollectionTestCase
{
    public function testGetKey()
    {
        $this->doTestGetKey(new Data(), 'data');
    }

}