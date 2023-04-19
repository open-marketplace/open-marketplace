<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Integration\Updater;

use ApiTestCase\JsonApiTestCase;
use BitBag\OpenMarketplace\Entity\Vendor;
use BitBag\OpenMarketplace\Entity\VendorProfileInterface;
use BitBag\OpenMarketplace\Entity\VendorProfileUpdate;
use BitBag\OpenMarketplace\Entity\VendorProfileUpdateBackgroundImage;
use BitBag\OpenMarketplace\Entity\VendorProfileUpdateImage;
use BitBag\OpenMarketplace\Factory\AddressFactoryInterface;
use BitBag\OpenMarketplace\Factory\VendorProfileFactoryInterface;
use BitBag\OpenMarketplace\Updater\VendorProfileUpdater;
use BitBag\OpenMarketplace\Updater\VendorProfileUpdaterInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Sylius\Component\Addressing\Model\Country;
use Sylius\Component\Mailer\Sender\SenderInterface;

class VendorProfileUpdaterTest extends JsonApiTestCase
{
    private VendorProfileUpdaterInterface $vendorProfileUpdater;

    private EntityManagerInterface $entityManager;

    private VendorProfileFactoryInterface $vendorProfileFactory;

    private AddressFactoryInterface $vendorAddressFactory;

    private EntityRepository $countryRepository;

    private EntityRepository $vendorRepository;

    private EntityRepository $vendorProfileUpdateRepository;

    public function setUp(): void
    {
        parent::setUp();

        $this->entityManager = static::$container->get('doctrine.orm.entity_manager');

        $this->countryRepository = $this->entityManager->getRepository(Country::class);
        $this->vendorRepository = $this->entityManager->getRepository(Vendor::class);
        $this->vendorProfileUpdateRepository = $this->entityManager->getRepository(VendorProfileUpdate::class);
        $this->vendorProfileUpdateRepository = $this->entityManager->getRepository(VendorProfileUpdate::class);
        $this->vendorAddressFactory = static::$container->get('open_marketplace.factory.vendor_address_factory');
        $this->vendorProfileFactory = static::$container->get('open_marketplace.factory.vendor_profile_factory');
        $this->vendorProfileUpdateImageFactoryInterface = static::$container->get('open_marketplace.service.vendor_profile_image_factory');
        $this->vendorProfileUpdateBackgroundImageFactoryInterface = static::$container->get('open_marketplace.service.vendor_profile_background_image_factory');
        $this->imageUploader = static::$container->get('sylius.image_uploader');
        $this->vendorLogoOperator = static::$container->get('open_marketplace.operator.vendor_logo');
        $this->vendorBackgroundOperator = static::$container->get('open_marketplace.operator.vendor_background');

        $remover = static::$container->get('open_marketplace.remover.profile_update_remover');
        $vendorProfileFactory = static::$container->get('open_marketplace.factory.vendor_profile_update_factory');

        $senderMock = $this->createMock(SenderInterface::class);
        $this->vendorProfileUpdater = new VendorProfileUpdater(
            $this->entityManager,
            $senderMock,
            $remover,
            $vendorProfileFactory,
            $this->vendorProfileUpdateImageFactoryInterface,
            $this->vendorProfileUpdateBackgroundImageFactoryInterface,
            $this->imageUploader,
            $this->vendorLogoOperator,
            $this->vendorBackgroundOperator
        );
    }

    public function test_it_doesnt_update_any_vendor_data_immediately(): void
    {
        $this->loadFixturesFromFile('VendorProfileUpdaterTest/test_it_doesnt_update_any_vendor_data_immediately.yml');

        $vendorDataBeforeFormSubmit = $this->vendorRepository
            ->findOneBy(['taxIdentifier' => '1234567']);

        $vendorFormData = $this->createFakeUpdateFormData();

        $fakeImage = new VendorProfileUpdateImage();
        $fakeImage->setPath('fakepath');
        $fakeBackgroundImage = new VendorProfileUpdateBackgroundImage();
        $fakeBackgroundImage->setPath('fakepath');

        $this->vendorProfileUpdater
            ->createPendingVendorProfileUpdate($vendorFormData, $vendorDataBeforeFormSubmit, $fakeImage, $fakeBackgroundImage);

        $pendingData = $this->vendorProfileUpdateRepository
            ->findOneBy(['vendor' => $vendorDataBeforeFormSubmit]);

        $this->assertNotEquals($pendingData->getCompanyName(), $vendorDataBeforeFormSubmit->getCompanyName());
    }

    private function createFakeUpdateFormData(): VendorProfileInterface
    {
        $poland = $this->countryRepository
            ->findOneBy(['code' => 'PL']);

        $address = $this->vendorAddressFactory
            ->createAddress('Grand Street', 'Warsaw', '00-22', $poland);

        $vendorData = $this->vendorProfileFactory
            ->createVendor('Grand Company', '221133', '0-33 221 333 111', 'description', $address);

        $vendorData->setSlug('test-slug');

        $this->entityManager->persist($vendorData);
        $this->entityManager->persist($address);

        return $vendorData;
    }

    public function test_it_creates_pending_data_row_from_data(): void
    {
        $this->loadFixturesFromFile('VendorProfileUpdaterTest/test_it_creates_pending_data_row_from_data.yml');

        $vendorFormData = $this->createFakeUpdateFormData();
        $currentVendor = $this->vendorRepository
            ->findOneBy(['taxIdentifier' => '1234567']);

        $fakeImage = new VendorProfileUpdateImage();
        $fakeImage->setPath('fakepath');
        $fakeBackgroundImage = new VendorProfileUpdateBackgroundImage();
        $fakeBackgroundImage->setPath('fakepath');

        $this->vendorProfileUpdater
            ->createPendingVendorProfileUpdate($vendorFormData, $currentVendor, $fakeImage, $fakeBackgroundImage);

        $pendingData = $this->entityManager
            ->getRepository(VendorProfileUpdate::class)
            ->findOneBy(['vendor' => $currentVendor]);

        $this->assertEquals($vendorFormData->getCompanyName(), $pendingData->getCompanyName());
    }

    public function test_vendor_information_is_updated_and_removed_correctly(): void
    {
        $this->loadFixturesFromFile('VendorProfileUpdaterTest/test_vendor_data_are_updated_and_removed_correctly.yml');

        $currentVendor = $this->vendorRepository
            ->findOneBy(['taxIdentifier' => '1234567']);

        $vendorId = $currentVendor->getId();

        $pendingData = $this->vendorProfileUpdateRepository
            ->findOneBy(['vendor' => $currentVendor]);

        $this->vendorProfileUpdater
            ->updateVendorFromPendingData($pendingData);

        $updatedVendor = $this->vendorRepository
            ->findOneBy(['taxIdentifier' => 'new number']);

        $pendingData = $this->vendorProfileUpdateRepository
            ->findOneBy(['vendor' => $updatedVendor]);

        $this->assertEquals($vendorId, $updatedVendor->getId());
        $this->assertEquals('new company', $updatedVendor->getCompanyName());
        $this->assertEquals(null, $pendingData);
    }
}
