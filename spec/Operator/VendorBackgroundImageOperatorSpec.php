<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Operator;

use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate\ProfileUpdateInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\BackgroundImageInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Factory\VendorBackgroundImageFactoryInterface;
use BitBag\OpenMarketplace\Operator\VendorBackgroundImageOperator;
use Doctrine\ORM\EntityManager;
use PhpSpec\ObjectBehavior;

final class VendorBackgroundImageOperatorSpec extends ObjectBehavior
{
    public function let(
        EntityManager $entityManager,
        VendorBackgroundImageFactoryInterface $vendorBackgroundImageFactory,
    ): void {
        $this->beConstructedWith(
            $entityManager,
            $vendorBackgroundImageFactory
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorBackgroundImageOperator::class);
    }

    public function it_replaces_background_image(
        EntityManager $entityManager,
        ProfileUpdateInterface $vendorData,
        VendorInterface $vendor,
        BackgroundImageInterface $updateImage,
        BackgroundImageInterface $oldImage,
        BackgroundImageInterface $newImage
    ): void {
        $vendorData->getBackgroundImage()->willReturn($updateImage);
        $vendor->getBackgroundImage()->willReturn($oldImage);
        $updateImage->getPath()->willReturn('path/to/file');

        $this->replaceVendorImage($vendorData, $vendor);

        $oldImage->setPath('path/to/file')->shouldHaveBeenCalledOnce();
        $oldImage->setOwner($vendor)->shouldHaveBeenCalledOnce();
        $vendor->setBackgroundImage($oldImage)->shouldHaveBeenCalledOnce();

        $updateImage->setPath(null)->shouldHaveBeenCalledOnce();
        $entityManager->persist($updateImage)->shouldHaveBeenCalledOnce();
    }

    public function it_does_nothing_when_no_update(
        EntityManager $entityManager,
        ProfileUpdateInterface $vendorData,
        VendorInterface $vendor,
        BackgroundImageInterface $updateImage,
        ): void {
        $vendorData->getBackgroundImage()->willReturn(null);

        $this->replaceVendorImage($vendorData, $vendor);
        $entityManager->persist($updateImage)->shouldNotBeCalled();
    }
}
