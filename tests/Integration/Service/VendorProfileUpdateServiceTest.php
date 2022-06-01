<?php

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Integration\Service;

//use Sylius\Tests\Api\JsonApiTestCase;

use ApiTestCase\JsonApiTestCase;

class VendorProfileUpdateServiceTest extends JsonApiTestCase
{
    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->dataFixturesPath = __DIR__.'DataFixtures';
    }    
   
    public function test_it_loads_fixtures()
    {
//        $this->loadFixturesFromFile();
    }
}
