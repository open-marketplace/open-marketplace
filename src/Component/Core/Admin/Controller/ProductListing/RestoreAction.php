<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Admin\Controller\ProductListing;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Repository\ListingRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\RouterInterface;

final class RestoreAction
{
    public function __construct(
        private ListingRepositoryInterface $productListingRepository,
        private RouterInterface $router,
        private EntityManagerInterface $entityManager,
        private FlashBagInterface $flashBag
    ) {
    }

    public function __invoke(Request $request): RedirectResponse
    {
        /** @var ListingInterface $productListing */
        $productListing = $this->productListingRepository->find($request->attributes->get('id'));

        $productListing->restore();

        $product = $productListing->getProduct();

        if ($product) {
            $product->setEnabled(true);
            $this->entityManager->persist($product);
        }

        $this->entityManager->persist($productListing);
        $this->entityManager->flush();

        $this->flashBag->set('success', 'open_marketplace.ui.restored');

        return new RedirectResponse($this->router->generate('open_marketplace_admin_product_listing_index'));
    }
}
