<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Core\Api\Messenger\CommandHandler\Vendor;

use BitBag\OpenMarketplace\Component\Core\Api\Messenger\Command\Vendor\UploadVendorImageInterface;
use BitBag\OpenMarketplace\Component\Core\Api\Messenger\CommandHandler\Vendor\UploadVendorLogoImageHandler;
use BitBag\OpenMarketplace\Component\Vendor\Entity\LogoImageInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Profile\Factory\LogoImageFactoryInterface;
use Doctrine\Persistence\ObjectManager;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class UploadVendorLogoImageHandlerSpec extends ObjectBehavior
{
    public function let(
        LogoImageFactoryInterface $vendorImageFactory,
        ImageUploaderInterface $imageUploader,
        ObjectManager $manager,
        RepositoryInterface $vendorImageRepository
    ): void {
        $this->beConstructedWith($vendorImageFactory, $imageUploader, $manager, $vendorImageRepository);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(UploadVendorLogoImageHandler::class);
    }

    public function it_creates_vendor_image(
        LogoImageFactoryInterface $vendorImageFactory,
        ImageUploaderInterface $imageUploader,
        ObjectManager $manager,
        UploadVendorImageInterface $command,
        VendorInterface $owner,
        LogoImageInterface $vendorImage
    ): void {
        $file = new UploadedFile(__FILE__, 'test');
        $command->getFile()->willReturn($file);
        $command->getOwner()->willReturn($owner);
        $owner->getImage()->willReturn(null);

        $vendorImageFactory->createNew()->willReturn($vendorImage);

        $vendorImage->setFile($file)->shouldBeCalled();
        $vendorImage->setOwner($owner)->shouldBeCalled();
        $owner->setImage($vendorImage)->shouldBeCalled();
        $imageUploader->upload($vendorImage)->shouldBeCalled();

        $manager->persist(Argument::any())->shouldBeCalledTimes(2);

        $this($command)->shouldReturn($vendorImage);
    }

    public function it_removes_previous_image(
        LogoImageFactoryInterface $vendorImageFactory,
        RepositoryInterface $vendorImageRepository,
        UploadVendorImageInterface $command,
        VendorInterface $owner,
        LogoImageInterface $previousImage,
        LogoImageInterface $vendorImage
    ): void {
        $file = new UploadedFile(__FILE__, 'test');
        $command->getFile()->willReturn($file);
        $command->getOwner()->willReturn($owner);
        $owner->getImage()->willReturn($previousImage);

        $vendorImageFactory->createNew()->willReturn($vendorImage);

        $vendorImage->setFile($file)->shouldBeCalled();
        $vendorImage->setOwner($owner)->shouldBeCalled();
        $owner->setImage($vendorImage)->shouldBeCalled();

        $vendorImageRepository->remove(Argument::any())->shouldBeCalled();

        $this($command)->shouldReturn($vendorImage);
    }

    public function it_throws_exception_on_empty_file(
        LogoImageFactoryInterface $vendorImageFactory,
        RepositoryInterface $vendorImageRepository,
        UploadVendorImageInterface $command,
        VendorInterface $owner,
        LogoImageInterface $previousImage,
        LogoImageInterface $vendorImage
    ): void {
        $command->getFile()->willReturn(null);

        $this
            ->shouldThrow(\DomainException::class)
            ->during('__invoke', [$command])
        ;
    }

    public function it_throws_exception_on_empty_owner(
        LogoImageFactoryInterface $vendorImageFactory,
        RepositoryInterface $vendorImageRepository,
        UploadVendorImageInterface $command,
        VendorInterface $owner,
        LogoImageInterface $previousImage,
        LogoImageInterface $vendorImage
    ): void {
        $file = new UploadedFile(__FILE__, 'test');
        $command->getFile()->willReturn($file);
        $command->getOwner()->willReturn(null);

        $this
            ->shouldThrow(\DomainException::class)
            ->during('__invoke', [$command])
        ;
    }
}
