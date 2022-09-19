<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Admin\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing\ProductListingRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

final class ChangeVisibilityAction
{
    private ProductListingRepositoryInterface $productListingRepository;

    private RouterInterface $router;

    private EntityManagerInterface $entityManager;

    public function __construct(
        ProductListingRepositoryInterface $productListingRepository,
        RouterInterface $router,
        EntityManagerInterface $entityManager
    ) {
        $this->productListingRepository = $productListingRepository;
        $this->router = $router;
        $this->entityManager = $entityManager;
    }

    public function __invoke(Request $request): RedirectResponse
    {
        /** @var ProductListingInterface $productListing */
        $productListing = $this->productListingRepository->find($request->attributes->get('id'));

        $newStatus = !$productListing->isHidden();
        $productListing->setHidden($newStatus);

        $product = $productListing->getProduct();

        if ($product) {
            $product->setHidden($newStatus);
            $this->entityManager->persist($product);
        }

        $this->entityManager->persist($productListing);
        $this->entityManager->flush();

        return new RedirectResponse($this->router->generate('bitbag_mvm_plugin_admin_product_listing_index'));
    }
}
