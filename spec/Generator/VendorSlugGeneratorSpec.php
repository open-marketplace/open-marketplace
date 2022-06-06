<?php

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Generator;

use BitBag\SyliusMultiVendorMarketplacePlugin\Generator\VendorSlugGenerator;
use BitBag\SyliusMultiVendorMarketplacePlugin\Generator\VendorSlugGeneratorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\VendorRepositoryInterface;
use PhpSpec\ObjectBehavior;

final class VendorSlugGeneratorSpec extends ObjectBehavior
{
    public function let(
        VendorRepositoryInterface $vendorRepository
    ) {
        $this->beConstructedWith(
            $vendorRepository
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorSlugGenerator::class);
    }

    public function it_should_implement_interface(): void
    {
        $this->shouldImplement(VendorSlugGeneratorInterface::class);
    }

    public function it_generates_slug(
        VendorRepositoryInterface $vendorRepository
    ): void {
        $vendorRepository->findOneBy(['slug' => 'test-company'])
            ->willReturn(null);

        $this->generateSlug('test company')
            ->shouldReturn('test-company');

        $this->generateSlug('test company');
    }
}
