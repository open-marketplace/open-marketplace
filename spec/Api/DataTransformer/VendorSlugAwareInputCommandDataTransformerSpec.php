<?php

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\DataTransformer;

use BitBag\OpenMarketplace\Api\DataTransformer\VendorSlugAwareInputCommandDataTransformer;
use BitBag\OpenMarketplace\Api\Messenger\Command\VendorSlugAwareInterface;
use BitBag\OpenMarketplace\Generator\VendorSlugGeneratorInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Bundle\ApiBundle\DataTransformer\CommandDataTransformerInterface;

class VendorSlugAwareInputCommandDataTransformerSpec extends ObjectBehavior
{
    public function let(
        VendorSlugGeneratorInterface $vendorSlugGenerator
    ): void {
        $this->beConstructedWith($vendorSlugGenerator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(VendorSlugAwareInputCommandDataTransformer::class);
        $this->shouldImplement(CommandDataTransformerInterface::class);
    }

    public function is_supports_shop_user_aware_interface(
        VendorSlugAwareInterface $vendorSlugAware
    ): void {
        $this->supportsTransformation($vendorSlugAware)->shouldReturn(true);
    }

    public function it_does_nothing_if_company_name_is_empty(
        VendorSlugAwareInterface $vendorSlugAware,
        VendorSlugGeneratorInterface $vendorSlugGenerator
    ): void {
        $vendorSlugAware->getCompanyName()->willReturn(null);
        $vendorSlugGenerator->generateSlug($vendorSlugAware->getCompanyName())->willReturn('slug');

        $vendorSlugAware->setSlug('slug')->shouldNotBeCalled();

        $this->transform($vendorSlugAware, '');
    }

    public function it_generate_and_set_slug(
        VendorSlugAwareInterface $vendorSlugAware,
        VendorSlugGeneratorInterface $vendorSlugGenerator
    ): void {
        $vendorSlugAware->getCompanyName()->willReturn('company');
        $vendorSlugGenerator->generateSlug('company')->willReturn('company');

        $vendorSlugAware->setSlug('company')->shouldBeCalled();

        $this->transform($vendorSlugAware, '');
    }
}
