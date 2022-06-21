<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Integration\Service;

use ApiTestCase\JsonApiTestCase;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdate;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\AddressFactory;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorFactory;
use BitBag\SyliusMultiVendorMarketplacePlugin\VendorProfileUpdater\VendorProfileUpdater;
use Sylius\Component\Addressing\Model\Country;
use Sylius\Component\Mailer\Sender\SenderInterface;

class VendorProfileUpdateServiceTest extends JsonApiTestCase
{
    private VendorProfileUpdater $vendorProfileUpdateService;

    public function __construct(
        ?string $name = null,
        array $data = [],
        $dataName = ''
    ) {
        parent::__construct($name, $data, $dataName);
    }

    public function setUp(): void
    {
        parent::setUp();
        $remover = static::$container->get('bitbag.sylius_multi_vendor_marketplace_plugin.service.remover');
        $sender = $this->createMock(SenderInterface::class);
        $this->vendorProfileUpdateService = new VendorProfileUpdater($this->getEntityManager(), $sender, $remover);
    }

    public function test_phpUnitLoadsFixtures(): void
    {
        $this->loadFixturesFromFile('test_it_doesnt_update_any_vendor_data_immediately.yml');
        $manager = $this->getEntityManager();
        $vendor = $manager->getRepository(Vendor::class)->findOneBy(['taxIdentifier' => '1234567']);
        self::assertEquals('Test company name', $vendor->getCompanyName());
    }

    public function test_it_doesnt_update_any_vendor_data_immediately(): void
    {
        $this->loadFixturesFromFile('test_it_doesnt_update_any_vendor_data_immediately.yml');
        $manager = $this->getEntityManager();

        $vendorDataBeforeFormSubmit = $manager->getRepository(Vendor::class)->findOneBy(['taxIdentifier' => '1234567']);
        $vendorFormData = $this->createFakeUpdateFormData();
        $this->vendorProfileUpdateService->createPendingVendorProfileUpdate($vendorFormData, $vendorDataBeforeFormSubmit);
        $pendingData = $manager->getRepository(VendorProfileUpdate::class)->findOneBy(['vendor' => $vendorDataBeforeFormSubmit]);

        $this->assertNotEquals($pendingData->getCompanyName(), $vendorDataBeforeFormSubmit->getCompanyName());
    }

    public function createFakeUpdateFormData(): VendorProfileInterface
    {
        $poland = $this->getEntityManager()->getRepository(Country::class)->findOneBy(['code' => 'PL']);
        $addressFactory = new AddressFactory();
        $address = $addressFactory->createAddress('Grand Street', 'Warsaw', '00-22', $poland);
        $vendorFactory = new VendorFactory();
        $vendorData = $vendorFactory->createVendor('Grand Company', '221133', '0-33 221 333 111', $address);

        return $vendorData;
    }

    public function test_it_creates_pending_data_row_from_data(): void
    {
        $this->loadFixturesFromFile('test_it_doesnt_update_any_vendor_data_immediately.yml');
        $manager = $this->getEntityManager();
        $vendorFormData = $this->createFakeUpdateFormData();
        $currentVendor = $manager->getRepository(Vendor::class)->findOneBy(['taxIdentifier' => '1234567']);
        $this->vendorProfileUpdateService->createPendingVendorProfileUpdate($vendorFormData, $currentVendor);

        $pendingData = $manager->getRepository(VendorProfileUpdate::class)->findOneBy(['vendor' => $currentVendor]);
        $this->assertEquals($vendorFormData->getCompanyName(), $pendingData->getCompanyName());
    }

    public function test_vendor_data_are_updated_and_removed_correctly(): void
    {
        $this->loadFixturesFromFile('test_vendor_data_are_updated_and_removed_correctly.yml');
        $manager = $this->getEntityManager();
        $currentVendor = $manager->getRepository(Vendor::class)->findOneBy(['taxIdentifier' => '1234567']);
        $pendingData = $manager->getRepository(VendorProfileUpdate::class)->findOneBy(['vendor' => $currentVendor]);

        $this->vendorProfileUpdateService->updateVendorFromPendingData($pendingData);
        $updatedVendor = $manager->getRepository(Vendor::class)->findOneBy(['taxIdentifier' => '1234567']);
        $this->assertEquals($currentVendor->getCompanyName(), $pendingData->getCompanyName());
        $this->assertEquals(null, $updatedVendor);
    }
}
