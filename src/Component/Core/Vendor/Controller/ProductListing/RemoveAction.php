<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Vendor\Controller\ProductListing;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingInterface;
use BitBag\OpenMarketplace\Repository\ProductListing\ProductListingRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\RouterInterface;

final class RemoveAction
{
    public function __construct(
        private ProductListingRepositoryInterface $productListingRepository,
        private RouterInterface $router,
        private EntityManagerInterface $entityManager,
        private FlashBag $flashBag
    ) {
    }

    public function __invoke(Request $request): RedirectResponse
    {
        /** @var ListingInterface $productListing */
        $productListing = $this->productListingRepository->find($request->attributes->get('id'));

        $productListing->remove();

        $product = $productListing->getProduct();

        if ($product) {
            $product->setEnabled(false);
            $this->entityManager->persist($product);
        }

        $this->entityManager->persist($productListing);
        $this->entityManager->flush();
        $this->flashBag->set('success', 'open_marketplace.ui.removed');

        return new RedirectResponse($this->router->generate('open_marketplace_vendor_product_listing_index'));
    }
}
