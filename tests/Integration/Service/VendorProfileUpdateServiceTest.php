<?php

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Integration\Service;

use ApiTestCase\JsonApiTestCase;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Customer;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\CustomerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddress;
use BitBag\SyliusMultiVendorMarketplacePlugin\Service\VendorProfileUpdateService;
use BitBag\SyliusMultiVendorMarketplacePlugin\Service\VendorProvider;
use Sylius\Component\Addressing\Model\Country;
use Sylius\Component\Mailer\Sender\SenderInterface;

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
    
    public function test_it_creates_pending_data_row_from_data()
    {
//        $vendorProvider = $this->getContainer()->get('bitbag.sylius_multi_vendor_marketplace_plugin.service.vendor_provider');
        $this->loadFixturesFromFile('vendor_fixtures.yml');
        $manager = $this->getEntityManager();
        $vendor = $manager->getRepository(Vendor::class)->findOneBy(['taxIdentifier'=>"1234567"]);
        $poland = $manager->getRepository(Country::class)->findOneBy(['code'=>"PL"]);
        $customer = $manager->getRepository(Customer::class)->findAll();
        dd($customer);
        $vendorData = new Vendor();
        $vendorData->setCustomer($this->createMock(CustomerInterface::class));
        $vendorData->setCompanyName("dsa");
        $vendorData->setTaxIdentifier('432432');
        $vendorData->setPhoneNumber('gfdgdf');
        $vendorData->setVendorAddress(new VendorAddress());
        $vendorData->getVendorAddress()->setStreet("fdsfsfs");
        $vendorData->getVendorAddress()->setCity("gfdgdfgd");
        $vendorData->getVendorAddress()->setPostalCode("dsfds");
        $vendorData->getVendorAddress()->setCountry($poland);               
       
        $senderMock = $this->createMock(SenderInterface::class);        
        $vendorProviderMock = $this->createMock(VendorProvider::class);    
        $vendorProviderMock->method('getLoggedVendor')->willReturn($vendor);
        $updateService = new VendorProfileUpdateService($this->getEntityManager(),$senderMock, $vendorProviderMock);
        $updateService->createPendingVendorProfileUpdate($vendorData);
    }
}
