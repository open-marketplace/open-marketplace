<?php

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Uploader;

use BitBag\SyliusMultiVendorMarketplacePlugin\Uploader\FileUploader;
use BitBag\SyliusMultiVendorMarketplacePlugin\Uploader\FileUploaderInterface;
use PhpSpec\ObjectBehavior;

final class FileUploaderSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(FileUploader::class);
    }

    public function it_should_implement_interface(): void
    {
        $this->shouldImplement(FileUploaderInterface::class);
    }
}
