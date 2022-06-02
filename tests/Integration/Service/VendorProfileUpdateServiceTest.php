<?php

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Integration\Service;

use ApiTestCase\JsonApiTestCase;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\CustomerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddress;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdate;
use BitBag\SyliusMultiVendorMarketplacePlugin\Service\VendorProfileUpdateService;
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
        $this->loadFixturesFromFile('vendor.yml');
        $manager = $this->getEntityManager();
        $vendor = $manager->getRepository(Vendor::class)->findOneBy(['taxIdentifier'=>"1234567"]);
        self::assertEquals('Test company name',$vendor->getCompanyName());     
    }
    public function test_doesnt_update_any_vendor_data_immediately()
    {
        $this->loadFixturesFromFile('vendor.yml');
        $manager = $this->getEntityManager();

        $vendorDataBeforeFormSubmit = $manager->getRepository(Vendor::class)->findOneBy(['taxIdentifier'=>'1234567']);
        $vendorFormData = $this->createFakeUpdateFormData();
        $sender = $this->createMock(SenderInterface::class);
        $updateService = new VendorProfileUpdateService($this->getEntityManager(), $sender);
        $updateService->createPendingVendorProfileUpdate($vendorFormData, $vendorDataBeforeFormSubmit);

        $pendingData = $manager->getRepository(VendorProfileUpdate::class)->findOneBy(['vendor'=>$vendorDataBeforeFormSubmit]);

        $this->assertNotEquals($pendingData->getCompanyName(), $vendorDataBeforeFormSubmit->getCompanyName());
    }

    public function createFakeUpdateFormData(): VendorInterface
    {
        $poland = $this->getEntityManager()->getRepository(Country::class)->findOneBy(['code'=>"PL"]);

        $vendorData = new Vendor();
        $vendorData->setCustomer($this->createMock(CustomerInterface::class));
        $vendorData->setCompanyName("Gr");
        $vendorData->setTaxIdentifier('432432');
        $vendorData->setPhoneNumber('gfdgdf');
        $vendorData->setVendorAddress(new VendorAddress());
        $vendorData->getVendorAddress()->setStreet("fdsfsfs");
        $vendorData->getVendorAddress()->setCity("gfdgdfgd");
        $vendorData->getVendorAddress()->setPostalCode("dsfds");
        $vendorData->getVendorAddress()->setCountry($poland);

        return $vendorData;
    }    

    public function test_it_creates_pending_data_row_from_data()
    {
        $this->loadFixturesFromFile('vendor.yml');
        $manager = $this->getEntityManager();

        $vendorFormData = $this->createFakeUpdateFormData();
        $currentVendor = $manager->getRepository(Vendor::class)->findOneBy(['taxIdentifier'=>'1234567']);
        $sender = $this->createMock(SenderInterface::class);
        $updateService = new VendorProfileUpdateService($this->getEntityManager(), $sender);
        $updateService->createPendingVendorProfileUpdate($vendorFormData, $currentVendor);

        $pendingData = $manager->getRepository(VendorProfileUpdate::class)->findOneBy(['vendor'=>$currentVendor]);
        $this->assertEquals($vendorFormData->getCompanyName(), $pendingData->getCompanyName());
    }
    
    public function test_vendor_data_are_updated_and_removed_correctly()
    {
        $this->loadFixturesFromFile('pending_data.yml');
        $manager = $this->getEntityManager();

        $currentVendor = $manager->getRepository(Vendor::class)->findOneBy(['taxIdentifier'=>'1234567']);       
        $pendingData = $manager->getRepository(VendorProfileUpdate::class)->findOneBy(['vendor'=>$currentVendor]);
        
        $sender = $this->createMock(SenderInterface::class);
        $updateService = new VendorProfileUpdateService($this->getEntityManager(), $sender);
        $updateService->updateVendorFromPendingData($pendingData);
        $updatedVendor = $manager->getRepository(Vendor::class)->findOneBy(['taxIdentifier'=>'1234567']);
        $this->assertEquals($currentVendor->getCompanyName(), $pendingData->getCompanyName());    
        $this->assertEquals(null, $updatedVendor);
    }
      
}
