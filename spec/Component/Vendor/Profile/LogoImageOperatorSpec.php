<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Vendor\Profile;

use BitBag\OpenMarketplace\Component\Vendor\Entity\LogoImageInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate\ProfileUpdateInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Profile\Factory\LogoImageFactoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Profile\LogoImageOperator;
use Doctrine\ORM\EntityManager;
use PhpSpec\ObjectBehavior;

final class LogoImageOperatorSpec extends ObjectBehavior
{
    public function let(
        EntityManager $entityManager,
        LogoImageFactoryInterface $vendorImageFactory
    ): void {
        $this->beConstructedWith(
            $entityManager,
            $vendorImageFactory
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(LogoImageOperator::class);
    }

    public function it_replaces_logo(
        EntityManager $entityManager,
        ProfileUpdateInterface $vendorData,
        VendorInterface $vendor,
        LogoImageInterface $updateImage,
        LogoImageInterface $oldImage,
        LogoImageInterface $newImage
    ): void {
        $vendorData->getImage()->willReturn($updateImage);
        $vendor->getImage()->willReturn($oldImage);
        $updateImage->getPath()->willReturn('path/to/file');

        $this->replaceVendorImage($vendorData, $vendor);

        $oldImage->setPath('path/to/file')->shouldHaveBeenCalledOnce();
        $oldImage->setOwner($vendor)->shouldHaveBeenCalledOnce();
        $vendor->setImage($oldImage)->shouldHaveBeenCalledOnce();

        $updateImage->setPath(null)->shouldHaveBeenCalledOnce();
    }

    public function it_creates_new_logo_entity(
        EntityManager $entityManager,
        ProfileUpdateInterface $vendorData,
        VendorInterface $vendor,
        LogoImageInterface $updateImage,
        LogoImageInterface $oldImage,
        LogoImageFactoryInterface $vendorImageFactory,
        LogoImageInterface $newImage
    ): void {
        $vendorData->getImage()->willReturn($updateImage);
        $vendor->getImage()->willReturn(null);
        $updateImage->getPath()->willReturn('path/to/file');
        $vendorImageFactory->createNew()->willReturn($newImage);

        $this->replaceVendorImage($vendorData, $vendor);

        $newImage->setPath('path/to/file')->shouldHaveBeenCalledOnce();
        $newImage->setOwner($vendor)->shouldHaveBeenCalledOnce();
        $vendor->setImage($newImage)->shouldHaveBeenCalledOnce();

        $updateImage->setPath(null)->shouldHaveBeenCalledOnce();
    }

    public function it_does_nothing_when_for_empty_image(
        EntityManager $entityManager,
        ProfileUpdateInterface $vendorData,
        VendorInterface $vendor,
        LogoImageInterface $updateImage,
        LogoImageInterface $oldImage,
        LogoImageFactoryInterface $vendorImageFactory,
        LogoImageInterface $newImage
    ): void {
        $vendorData->getImage()->willReturn(null);
        $vendor->getImage()->willReturn(null);
        $updateImage->getPath()->willReturn('path/to/file');
        $vendorImageFactory->createNew()->willReturn($newImage);

        $this->replaceVendorImage($vendorData, $vendor);

        $newImage->setPath('path/to/file')->shouldNotHaveBeenCalled();
        $newImage->setOwner($vendor)->shouldNotHaveBeenCalled();
        $vendor->setImage($newImage)->shouldNotHaveBeenCalled();

        $updateImage->setPath(null)->shouldNotHaveBeenCalled();
    }
}
