<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Vendor\Profile;

use BitBag\OpenMarketplace\Component\Vendor\Entity\AddressInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate\ProfileUpdateInterface;
use BitBag\OpenMarketplace\Component\Vendor\Profile\ProfileUpdateRemover;
use BitBag\OpenMarketplace\Component\Vendor\Profile\ProfileUpdateRemoverInterface;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;

final class ProfileUpdateRemoverSpec extends ObjectBehavior
{
    public function let(
        EntityManagerInterface $entityManager
    ): void {
        $this->beConstructedWith($entityManager);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ProfileUpdateRemover::class);
        $this->shouldImplement(ProfileUpdateRemoverInterface::class);
    }

    public function it_removes_profile_update(
        EntityManagerInterface $entityManager,
        ProfileUpdateInterface $vendorProfileUpdate
    ): void {
        $vendorProfileUpdate->getVendorAddress()
            ->willReturn(null);

        $entityManager->remove($vendorProfileUpdate)
            ->shouldBeCalledOnce();

        $entityManager->flush()
            ->shouldBeCalledOnce();

        $this->removePendingUpdate($vendorProfileUpdate);
    }

    public function it_removes_profile_update_and_address_update(
        EntityManagerInterface $entityManager,
        ProfileUpdateInterface $vendorProfileUpdate,
        AddressInterface $vendorProfileAddressUpdate
    ): void {
        $vendorProfileUpdate->getVendorAddress()
            ->willReturn($vendorProfileAddressUpdate);

        $entityManager->remove($vendorProfileAddressUpdate)
            ->shouldBeCalledOnce();

        $entityManager->remove($vendorProfileUpdate)
            ->shouldBeCalledOnce();

        $entityManager->flush()
            ->shouldBeCalledOnce();

        $this->removePendingUpdate($vendorProfileUpdate);
    }
}
