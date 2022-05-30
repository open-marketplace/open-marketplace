<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Admin\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Admin\ProductListing\ShowAction;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListingRepositoryInterface;
use PhpSpec\ObjectBehavior;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

final class ShowActionSpec extends ObjectBehavior
{
    public function let(
        ProductListingRepositoryInterface $productListingRepository,
        Environment $twig
    ): void {
        $this->beConstructedWith(
            $productListingRepository,
            $twig
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ShowAction::class);
    }

    public function it_should_redirect_to_the_product_listing_details(
        ProductListingRepositoryInterface $productListingRepository,
        ProductListingInterface $productListing
    ) {
        $request = new Request();
        $request->attributes->add(['id' => 10]);

        $productListingRepository->find($request->attributes->get('id'))
            ->willReturn($productListing);

        $productListingRepository->find($request->attributes->get('id'))->shouldBeCalled();

        $this->__invoke($request);
    }
}
