<?php

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Integration\Service;

use ApiTestCase\JsonApiTestCase;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;

class VendorProfileUpdateServiceTest extends JsonApiTestCase
{
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);        
    }

    public function test_phpUnitLoadsFixtures()
    {
        $this->loadFixturesFromFile('vendor_fixtures.yml');
        $manager = $this->getEntityManager();
        $vendor = $manager->getRepository(Vendor::class)->findOneBy(['taxIdentifier'=>"1234567"]);
        self::assertEquals('Test company name',$vendor->getCompanyName());     
    }
}
