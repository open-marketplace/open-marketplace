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
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate\BackgroundImage;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate\LogoImage;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate\ProfileUpdate;
use BitBag\OpenMarketplace\Component\Vendor\Entity\Vendor;
use BitBag\OpenMarketplace\Component\Vendor\Profile\Factory\AddressFactoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Profile\Factory\ProfileFactoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\ProfileUpdater;
use BitBag\OpenMarketplace\Component\Vendor\ProfileUpdaterInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Sylius\Component\Addressing\Model\Country;
use Sylius\Component\Mailer\Sender\SenderInterface;

class VendorProfileUpdaterTest extends JsonApiTestCase
{
    private ProfileUpdaterInterface $vendorProfileUpdater;

    private EntityManagerInterface $entityManager;

    private ProfileFactoryInterface $vendorProfileFactory;

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
        $this->vendorProfileUpdateRepository = $this->entityManager->getRepository(ProfileUpdate::class);
        $this->vendorProfileUpdateRepository = $this->entityManager->getRepository(ProfileUpdate::class);
        $this->vendorAddressFactory = static::$container->get('bitbag.open_marketplace.component.vendor.profile.factory.address');
        $this->vendorProfileFactory = static::$container->get('bitbag.open_marketplace.component.vendor.profile.factory.profile_factory');
        $this->vendorProfileUpdateImageFactoryInterface = static::$container->get('bitbag.open_marketplace.component.vendor.profile.factory.profile_logo_image_factory');
        $this->vendorProfileUpdateBackgroundImageFactoryInterface = static::$container->get('bitbag.open_marketplace.component.vendor.profile.factory.profile_background_image_factory');
        $this->imageUploader = static::$container->get('sylius.image_uploader');
        $this->vendorLogoOperator = static::$container->get('bitbag.open_marketplace.component.vendor.profile.logo_image_operator');
        $this->vendorBackgroundImageOperator = static::$container->get('bitbag.open_marketplace.component.vendor.profile.background_image_operator');

        $remover = static::$container->get('bitbag.open_marketplace.component.vendor.profile.profile_update_remover');
        $vendorProfileFactory = static::$container->get('bitbag.open_marketplace.component.vendor.profile.factory.profile_update_factory');

        $senderMock = $this->createMock(SenderInterface::class);
        $this->vendorProfileUpdater = new ProfileUpdater(
            $this->entityManager,
            $senderMock,
            $remover,
            $vendorProfileFactory,
            $this->vendorProfileUpdateImageFactoryInterface,
            $this->vendorProfileUpdateBackgroundImageFactoryInterface,
            $this->imageUploader,
            $this->vendorLogoOperator,
            $this->vendorBackgroundImageOperator
        );
    }

    public function test_it_doesnt_update_any_vendor_data_immediately(): void
    {
        $this->loadFixturesFromFile('VendorProfileUpdaterTest/test_it_doesnt_update_any_vendor_data_immediately.yml');

        $vendorDataBeforeFormSubmit = $this->vendorRepository
            ->findOneBy(['taxIdentifier' => '1234567']);

        $vendorFormData = $this->createFakeUpdateFormData();

        $fakeImage = new LogoImage();
        $fakeImage->setPath('fakepath');
        $fakeBackgroundImage = new BackgroundImage();
        $fakeBackgroundImage->setPath('fakepath');

        $this->vendorProfileUpdater
            ->createPendingVendorProfileUpdate($vendorFormData, $vendorDataBeforeFormSubmit, $fakeImage, $fakeBackgroundImage);

        $pendingData = $this->vendorProfileUpdateRepository
            ->findOneBy(['vendor' => $vendorDataBeforeFormSubmit]);

        $this->assertNotEquals($pendingData->getCompanyName(), $vendorDataBeforeFormSubmit->getCompanyName());
    }

    private function createFakeUpdateFormData(): ProfileInterface
    {
        $poland = $this->countryRepository
            ->findOneBy(['code' => 'PL']);

        $address = $this->vendorAddressFactory
            ->createAddress('Grand Street', 'Warsaw', '00-22', $poland);

        $vendorData = $this->vendorProfileFactory
            ->createVendor('Grand Company', '221133', 'PL14109024029586826934815556', '0-33 221 333 111', 'description', $address);

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

        $fakeImage = new LogoImage();
        $fakeImage->setPath('fakepath');
        $fakeBackgroundImage = new BackgroundImage();
        $fakeBackgroundImage->setPath('fakepath');

        $this->vendorProfileUpdater
            ->createPendingVendorProfileUpdate($vendorFormData, $currentVendor, $fakeImage, $fakeBackgroundImage);

        $pendingData = $this->entityManager
            ->getRepository(ProfileUpdate::class)
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
