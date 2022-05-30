<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Admin\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Admin\ProductListing\AcceptAction;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListingRepositoryInterface;
use PhpSpec\ObjectBehavior;
use SM\Factory\FactoryInterface;
use SM\StateMachine\StateMachineInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

final class AcceptActionSpec extends ObjectBehavior
{
    public function let(
        ProductListingRepositoryInterface $productListingRepository,
        RouterInterface $router,
        FactoryInterface $SMFactory
    ): void {
        $this->beConstructedWith(
            $productListingRepository,
            $router,
            $SMFactory
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(AcceptAction::class);
    }

    public function it_verifies_product_listing(
        ProductListingRepositoryInterface $productListingRepository,
        ProductListingInterface $productListing,
        FactoryInterface $SMfactory,
        StateMachineInterface $stateMachine
    ) {
        $request = new Request();
        $request->attributes->add(['id' => 10]);

        $productListingRepository->find($request->attributes->get('id'))
            ->willReturn($productListing);

        $SMfactory->get($productListing, 'product_listing')
            ->willReturn($stateMachine);

        $productListingRepository->find($request->attributes->get('id'))->shouldBeCalled();

        $SMfactory->get($productListing, 'product_listing')
            ->shouldBeCalled();

        $stateMachine->can('accept_product_listing')
            ->shouldBeCalled();

        $stateMachine->apply('accept_product_listing')
            ->shouldBeCalled();

        $this->__invoke($request);
    }
}
