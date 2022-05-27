<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Admin\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Admin\ProductListing\RejectAction;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListingRepositoryInterface;
use PhpSpec\ObjectBehavior;
use SM\Factory\FactoryInterface;
use Symfony\Component\Routing\RouterInterface;
use Twig\Environment;

final class RejectActionSpec extends ObjectBehavior
{
    public function let(
        ProductListingRepositoryInterface $productListingRepository,
        Environment $twig,
        RouterInterface $router,
        FactoryInterface $SMFactory
    ): void {
        $this->beConstructedWith(
            $productListingRepository,
            $twig,
            $router,
            $SMFactory
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(RejectAction::class);
    }
}
