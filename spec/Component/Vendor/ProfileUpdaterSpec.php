<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Vendor;

use BitBag\OpenMarketplace\Component\Vendor\Entity\AddressInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\BackgroundImageInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\LogoImageInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate\ProfileUpdateInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Profile\BackgroundImageOperatorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Profile\LogoImageOperatorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Profile\ProfileUpdateRemoverInterface;
use BitBag\OpenMarketplace\Component\Vendor\ProfileUpdaterInterface;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Factory\VendorProfileUpdateBackgroundImageFactoryInterface;
use BitBag\OpenMarketplace\Factory\VendorProfileUpdateFactoryInterface;
use BitBag\OpenMarketplace\Factory\VendorProfileUpdateImageFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Uploader\ImageUploader;
use Sylius\Component\Mailer\Sender\SenderInterface;
use Symfony\Component\Finder\SplFileInfo;

final class ProfileUpdaterSpec extends ObjectBehavior
{
    public function let(
        EntityManagerInterface $entityManager,
        SenderInterface $sender,
        ProfileUpdateRemoverInterface $remover,
        VendorProfileUpdateFactoryInterface $vendorProfileFactory,
        VendorProfileUpdateImageFactoryInterface $imageFactory,
        VendorProfileUpdateBackgroundImageFactoryInterface $backgroundImageFactory,
        ImageUploader $imageUploader,
        LogoImageOperatorInterface $vendorLogoOperator,
        BackgroundImageOperatorInterface $VendorBackgroundImageOperator
    ): void {
        $this->beConstructedWith(
            $entityManager,
            $sender,
            $remover,
            $vendorProfileFactory,
            $imageFactory,
            $backgroundImageFactory,
            $imageUploader,
            $vendorLogoOperator,
            $VendorBackgroundImageOperator
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ProfileUpdaterInterface::class);
    }

    public function it_calls_entity_manager(
        EntityManagerInterface $entityManager,
        VendorInterface $vendor,
        ProfileInterface $vendorData,
        AddressInterface $vendorAddress
    ): void {
        $vendorData->getCompanyName()->willReturn('CompanyName');
        $vendorData->getTaxIdentifier()->willReturn('TaxIdentifier');
        $vendorData->getPhoneNumber()->willReturn('11339321');
        $vendorData->getDescription()->willReturn('description');
        $vendorData->getVendorAddress()->willReturn($vendorAddress);

        $this->setVendorFromData($vendor, $vendorData);

        $entityManager->flush()->shouldHaveBeenCalled(1);
        $entityManager->persist($vendor)->shouldHaveBeenCalledTimes(1);
    }

    public function it_sends_email_after_creating_pending_data(
        SenderInterface $sender,
        VendorProfileUpdateFactoryInterface $vendorProfileFactory,
        VendorInterface $vendor,
        ProfileInterface $vendorData,
        ProfileUpdateInterface $newPendingUpdate,
        ShopUserInterface $user,
        AddressInterface $vendorAddressUpdate,
        LogoImageInterface $imageFromForm,
        BackgroundImageInterface $backgroundImageFromForm
    ): void {
        $vendorProfileFactory->createWithGeneratedTokenAndVendor($vendor)->willReturn($newPendingUpdate);
        $newPendingUpdate->getToken()->willReturn('testing-token');
        $vendorData->getCompanyName()->willReturn('testcompany');
        $vendorData->getTaxIdentifier()->willReturn('testTaxID');
        $vendorData->getPhoneNumber()->willReturn('testNumber');
        $vendorData->getDescription()->willReturn('description');
        $vendorData->getVendorAddress()->willReturn($vendorAddressUpdate);
        $imageFromForm->getFile()->willReturn(null);
        $imageFromForm->getPath()->willReturn('path/to/file');
        $backgroundImageFromForm->getFile()->willReturn(null);
        $backgroundImageFromForm->getPath()->willReturn('path/to/file');
        $newPendingUpdate->getVendorAddress()->shouldBeCalled();

        $newPendingUpdate->setCompanyName('testcompany')->shouldBeCalled();
        $newPendingUpdate->setTaxIdentifier('testTaxID')->shouldBeCalled();
        $newPendingUpdate->setPhoneNumber('testNumber')->shouldBeCalled();
        $newPendingUpdate->setDescription('description')->shouldBeCalled();

        $vendor->getShopUser()->willReturn($user);

        $user->getEmail()->willReturn('test@mail.at');

        $this->createPendingVendorProfileUpdate($vendorData, $vendor, $imageFromForm, $backgroundImageFromForm);

        $sender->send('vendor_profile_update', ['test@mail.at'], ['token' => 'testing-token'])
            ->shouldHaveBeenCalledTimes(1);
    }

    public function it_creates_new_image_object_for_new_image_upload(
        SenderInterface $sender,
        VendorProfileUpdateFactoryInterface $vendorProfileFactory,
        VendorInterface $vendor,
        ProfileInterface $vendorData,
        ProfileUpdateInterface $newPendingUpdate,
        ShopUserInterface $user,
        AddressInterface $vendorAddressUpdate,
        LogoImageInterface $imageFromForm,
        VendorProfileUpdateImageFactoryInterface $imageFactory,
        LogoImageInterface $newImage,
        BackgroundImageInterface $backgroundImageFromForm,
        VendorProfileUpdateBackgroundImageFactoryInterface $backgroundImageFactory,
        BackgroundImageInterface $newBackgroundImage,
        ImageUploader $imageUploader,
        SplFileInfo $fileInfo
    ): void {
        $vendorProfileFactory->createWithGeneratedTokenAndVendor($vendor)->willReturn($newPendingUpdate);
        $newPendingUpdate->getToken()->willReturn('testing-token');
        $vendorData->getCompanyName()->willReturn('testcompany');
        $vendorData->getTaxIdentifier()->willReturn('testTaxID');
        $vendorData->getPhoneNumber()->willReturn('testNumber');
        $vendorData->getDescription()->willReturn('description');
        $vendorData->getVendorAddress()->willReturn($vendorAddressUpdate);

        $imageFromForm->getFile()->willReturn($fileInfo);
        $imageFactory->createWithFileAndOwner($imageFromForm, $newPendingUpdate)->willReturn($newImage);
        $imageUploader->upload($newImage);
        $newPendingUpdate->setImage($newImage)->shouldBeCalledOnce();

        $backgroundImageFromForm->getFile()->willReturn($fileInfo);
        $backgroundImageFactory->createWithFileAndOwner($backgroundImageFromForm, $newPendingUpdate)->willReturn($newBackgroundImage);
        $imageUploader->upload($newBackgroundImage);
        $newPendingUpdate->setBackgroundImage($newBackgroundImage)->shouldBeCalledOnce();

        $newPendingUpdate->getVendorAddress()->shouldBeCalled();

        $newPendingUpdate->setCompanyName('testcompany')->shouldBeCalled();
        $newPendingUpdate->setTaxIdentifier('testTaxID')->shouldBeCalled();
        $newPendingUpdate->setPhoneNumber('testNumber')->shouldBeCalled();
        $newPendingUpdate->setDescription('description')->shouldBeCalled();
        $imageFromForm->getPath()->willReturn('path/to/file');
        $backgroundImageFromForm->getPath()->willReturn('path/to/file');
        $vendor->getShopUser()->willReturn($user);
        $user->getEmail()->willReturn('test@mail.at');

        $this->createPendingVendorProfileUpdate($vendorData, $vendor, $imageFromForm, $backgroundImageFromForm);

        $sender->send('vendor_profile_update', ['test@mail.at'], ['token' => 'testing-token'])
            ->shouldHaveBeenCalledTimes(1);
    }
}
