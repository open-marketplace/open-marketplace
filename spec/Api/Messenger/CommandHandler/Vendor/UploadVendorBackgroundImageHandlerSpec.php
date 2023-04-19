<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\Messenger\CommandHandler\Vendor;

use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\UploadVendorBackgroundImageInterface;
use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\UploadVendorImageInterface;
use BitBag\OpenMarketplace\Api\Messenger\CommandHandler\Vendor\UploadVendorBackgroundImageHandler;
use BitBag\OpenMarketplace\Api\Messenger\CommandHandler\Vendor\UploadVendorImageHandler;
use BitBag\OpenMarketplace\Entity\VendorBackgroundImageInterface;
use BitBag\OpenMarketplace\Entity\VendorImageInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Factory\VendorBackgroundImageFactoryInterface;
use BitBag\OpenMarketplace\Factory\VendorImageFactoryInterface;
use Doctrine\Persistence\ObjectManager;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class UploadVendorBackgroundImageHandlerSpec extends ObjectBehavior
{
    public function let(
        VendorBackgroundImageFactoryInterface $vendorBackgroundImageFactory,
        ImageUploaderInterface $imageUploader,
        ObjectManager $manager,
        RepositoryInterface $vendorBackgroundImageRepository
    ): void {
        $this->beConstructedWith($vendorBackgroundImageFactory, $imageUploader, $manager, $vendorBackgroundImageRepository);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(UploadVendorBackgroundImageHandler::class);
    }

    public function it_creates_vendor_background_image(
        VendorBackgroundImageFactoryInterface $vendorBackgroundImageFactory,
        ImageUploaderInterface $imageUploader,
        ObjectManager $manager,
        UploadVendorBackgroundImageInterface $command,
        VendorInterface $owner,
        VendorBackgroundImageInterface $vendorBackgroundImage
    ): void {
        $file = new UploadedFile(__FILE__, 'test');
        $command->getFile()->willReturn($file);
        $command->getOwner()->willReturn($owner);
        $owner->getBackgroundImage()->willReturn(null);

        $vendorBackgroundImageFactory->createNew()->willReturn($vendorBackgroundImage);

        $vendorBackgroundImage->setFile($file)->shouldBeCalled();
        $vendorBackgroundImage->setOwner($owner)->shouldBeCalled();
        $owner->setBackgroundImage($vendorBackgroundImage)->shouldBeCalled();
        $imageUploader->upload($vendorBackgroundImage)->shouldBeCalled();

        $manager->persist(Argument::any())->shouldBeCalledTimes(2);

        $this($command)->shouldReturn($vendorBackgroundImage);
    }

    public function it_removes_previous_background_image(
        VendorBackgroundImageFactoryInterface $vendorBackgroundImageFactory,
        RepositoryInterface $vendorBackgroundImageRepository,
        UploadVendorBackgroundImageInterface $command,
        VendorInterface $owner,
        VendorBackgroundImageInterface $previousBackgroundImage,
        VendorBackgroundImageInterface $vendorBackgroundImage
    ): void {
        $file = new UploadedFile(__FILE__, 'test');
        $command->getFile()->willReturn($file);
        $command->getOwner()->willReturn($owner);
        $owner->getBackgroundImage()->willReturn($previousBackgroundImage);

        $vendorBackgroundImageFactory->createNew()->willReturn($vendorBackgroundImage);

        $vendorBackgroundImage->setFile($file)->shouldBeCalled();
        $vendorBackgroundImage->setOwner($owner)->shouldBeCalled();
        $owner->setBackgroundImage($vendorBackgroundImage)->shouldBeCalled();

        $vendorBackgroundImageRepository->remove(Argument::any())->shouldBeCalled();

        $this($command)->shouldReturn($vendorBackgroundImage);
    }

    public function it_throws_exception_on_empty_file(
        VendorBackgroundImageFactoryInterface $vendorBackgroundImageFactory,
        RepositoryInterface $vendorBackgroundImageRepository,
        UploadVendorBackgroundImageInterface $command,
        VendorInterface $owner,
        VendorBackgroundImageInterface $previousBackgroundImage,
        VendorBackgroundImageInterface $vendorBackgroundImage
    ): void {
        $command->getFile()->willReturn(null);

        $this
            ->shouldThrow(\DomainException::class)
            ->during('__invoke', [$command])
        ;
    }

    public function it_throws_exception_on_empty_owner(
        VendorBackgroundImageFactoryInterface $vendorBackgroundImageFactory,
        RepositoryInterface $vendorBackgroundImageRepository,
        UploadVendorBackgroundImageInterface $command,
        VendorInterface $owner,
        VendorBackgroundImageInterface $previousBackgroundImage,
        VendorBackgroundImageInterface $vendorBackgroundImage
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
