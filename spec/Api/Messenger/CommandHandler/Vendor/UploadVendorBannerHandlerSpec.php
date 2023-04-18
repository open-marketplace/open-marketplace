<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\Messenger\CommandHandler\Vendor;

use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\UploadVendorImageInterface;
use BitBag\OpenMarketplace\Api\Messenger\CommandHandler\Vendor\UploadVendorBannerHandler;
use BitBag\OpenMarketplace\Entity\VendorImageInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Factory\VendorImageFactoryInterface;
use Doctrine\Persistence\ObjectManager;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class UploadVendorBannerHandlerSpec extends ObjectBehavior
{
    public function let(
        VendorImageFactoryInterface $vendorImageFactory,
        ImageUploaderInterface $imageUploader,
        ObjectManager $manager,
        RepositoryInterface $vendorImageRepository
    ): void {
        $this->beConstructedWith($vendorImageFactory, $imageUploader, $manager, $vendorImageRepository);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(UploadVendorBannerHandler::class);
    }

    public function it_creates_vendor_image(
        VendorImageFactoryInterface $vendorImageFactory,
        ImageUploaderInterface $imageUploader,
        ObjectManager $manager,
        UploadVendorImageInterface $command,
        VendorInterface $owner,
        VendorImageInterface $vendorImage
    ): void {
        $file = new UploadedFile(__FILE__, 'test');
        $command->getFile()->willReturn($file);
        $command->getOwner()->willReturn($owner);
        $owner->getBanner()->willReturn(null);

        $vendorImageFactory->createNew()->willReturn($vendorImage);

        $vendorImage->setFile($file)->shouldBeCalled();
        $vendorImage->setOwner($owner)->shouldBeCalled();
        $owner->setBanner($vendorImage)->shouldBeCalled();
        $vendorImage->setType('banner')->shouldBeCalled();
        $imageUploader->upload($vendorImage)->shouldBeCalled();

        $manager->persist(Argument::any())->shouldBeCalledTimes(2);

        $this($command)->shouldReturn($vendorImage);
    }

    public function it_removes_previous_image(
        VendorImageFactoryInterface $vendorImageFactory,
        RepositoryInterface $vendorImageRepository,
        UploadVendorImageInterface $command,
        VendorInterface $owner,
        VendorImageInterface $previousImage,
        VendorImageInterface $vendorImage
    ): void {
        $file = new UploadedFile(__FILE__, 'test');
        $command->getFile()->willReturn($file);
        $command->getOwner()->willReturn($owner);
        $owner->getBanner()->willReturn($previousImage);

        $vendorImageFactory->createNew()->willReturn($vendorImage);

        $vendorImage->setFile($file)->shouldBeCalled();
        $vendorImage->setOwner($owner)->shouldBeCalled();
        $owner->setBanner($vendorImage)->shouldBeCalled();

        $vendorImageRepository->remove(Argument::any())->shouldBeCalled();

        $this($command)->shouldReturn($vendorImage);
    }

    public function it_throws_exception_on_empty_file(
        VendorImageFactoryInterface $vendorImageFactory,
        RepositoryInterface $vendorImageRepository,
        UploadVendorImageInterface $command,
        VendorInterface $owner,
        VendorImageInterface $previousImage,
        VendorImageInterface $vendorImage
    ): void {
        $command->getFile()->willReturn(null);

        $this
            ->shouldThrow(\DomainException::class)
            ->during('__invoke', [$command])
        ;
    }

    public function it_throws_exception_on_empty_owner(
        VendorImageFactoryInterface $vendorImageFactory,
        RepositoryInterface $vendorImageRepository,
        UploadVendorImageInterface $command,
        VendorInterface $owner,
        VendorImageInterface $previousImage,
        VendorImageInterface $vendorImage
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
