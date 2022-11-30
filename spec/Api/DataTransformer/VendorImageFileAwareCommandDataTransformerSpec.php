<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\DataTransformer;

use BitBag\OpenMarketplace\Api\DataTransformer\VendorImageFileAwareCommandDataTransformer;
use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\VendorImageFileAwareInterface;
use PhpSpec\ObjectBehavior;
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

    public function is_supports_shop_user_aware_interface(
        VendorImageFileAwareInterface $vendorImageFileAware
    ): void {
        $this->supportsTransformation($vendorImageFileAware)->shouldReturn(true);
    }
}
