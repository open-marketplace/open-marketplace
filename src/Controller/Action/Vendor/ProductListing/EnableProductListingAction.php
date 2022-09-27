<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Vendor\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing\ProductListingRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\RouterInterface;

final class EnableProductListingAction
{
    private ProductListingRepositoryInterface $productListingRepository;

    private EntityManagerInterface $entityManager;

    private RouterInterface $router;

    private FlashBagInterface $flashBag;

    public function __construct(
        ProductListingRepositoryInterface $productListingRepository,
        EntityManagerInterface $entityManager,
        RouterInterface $router,
        FlashBagInterface $flashBag
    ) {
        $this->productListingRepository = $productListingRepository;
        $this->entityManager = $entityManager;
        $this->router = $router;
        $this->flashBag = $flashBag;
    }

    public function __invoke(Request $request): RedirectResponse
    {
        $listing = $this->productListingRepository->find($request->get('id'));

        $enableState = $listing->isEnabled();

        $listing->setEnabled(!$enableState);
        $product = $listing->getProduct();

        if ($product) {
            $product->setEnabled($enableState);
            $this->entityManager->persist($product);
        }

        $msgString = $enableState ? 'bitbag_mvm_plugin.ui.enabled' : 'bitbag_mvm_plugin.ui.disabled';

        $this->flashBag->set('success', $msgString);
        $this->entityManager->persist($listing);
        $this->entityManager->flush();

        return new RedirectResponse($this->router->generate('bitbag_mvm_plugin_vendor_product_listing_index'));
    }
}
