<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\Messenger\CommandHandler\Vendor;

use BitBag\OpenMarketplace\Api\Messenger\CommandHandler\Vendor\UploadVendorImageHandler;
use BitBag\OpenMarketplace\Factory\VendorImageFactoryInterface;
use Doctrine\Persistence\ObjectManager;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

final class UploadVendorImageHandlerSpec extends ObjectBehavior
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
        $this->shouldHaveType(UploadVendorImageHandler::class);
    }
}
