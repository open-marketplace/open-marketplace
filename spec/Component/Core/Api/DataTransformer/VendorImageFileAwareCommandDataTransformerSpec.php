<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Core\Api\DataTransformer;

use BitBag\OpenMarketplace\Component\Core\Api\DataTransformer\VendorImageFileAwareCommandDataTransformer;
use BitBag\OpenMarketplace\Component\Core\Api\Messenger\Command\Vendor\VendorImageFileAwareInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\FileBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

final class VendorImageFileAwareCommandDataTransformerSpec extends ObjectBehavior
{
    public function let(
        RequestStack $requestStack
    ): void {
        $this->beConstructedWith($requestStack);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorImageFileAwareCommandDataTransformer::class);
    }

    public function it_supports_shop_user_aware_interface(
        VendorImageFileAwareInterface $vendorImageFileAware
    ): void {
        $this->supportsTransformation($vendorImageFileAware)->shouldReturn(true);
    }

    public function it_does_nothing_when_there_is_no_file_in_request(
        VendorImageFileAwareInterface $vendorImageFileAware,
        RequestStack $requestStack,
        Request $request,
        ): void {
        $request->files = new FileBag();
        $requestStack->getCurrentRequest()->willReturn($request);

        $vendorImageFileAware->setFile(Argument::any())->shouldNotBeCalled();

        $this->transform($vendorImageFileAware, '');
    }

    public function it_sets_the_file_when_there_is_one_in_request(
        VendorImageFileAwareInterface $vendorImageFileAware,
        RequestStack $requestStack,
        Request $request
    ): void {
        $file = new UploadedFile(__FILE__, 'test');
        $request->files = new FileBag(['file' => $file]);
        $requestStack->getCurrentRequest()->willReturn($request);

        $vendorImageFileAware->setFile($file)->shouldBeCalled();

        $this->transform($vendorImageFileAware, '');
    }
}
