<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\Messenger\Command\Vendor;

use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\UploadVendorImage;
use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\UploadVendorImageInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use PhpSpec\ObjectBehavior;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class UploadVendorImageSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(UploadVendorImage::class);
        $this->shouldImplement(UploadVendorImageInterface::class);
    }

    public function it_has_file(): void
    {
        $file = new UploadedFile(__FILE__, 'test');
        $this->setFile($file);
        $this->getFile()->shouldReturn($file);
    }

    public function it_has_owner(VendorInterface $vendor): void
    {
        $this->setOwner($vendor);
        $this->getOwner()->shouldReturn($vendor);
    }
}
