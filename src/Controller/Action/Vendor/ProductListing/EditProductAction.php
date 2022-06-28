<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Vendor\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Command\ProductListing\CreateProductListingCommandInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Form\ProductListing\ProductType;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing\ProductDraftRepositoryInterface;
use Sylius\Bundle\ResourceBundle\Controller\RequestConfigurationFactoryInterface;
use Sylius\Component\Resource\Metadata\MetadataInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\ClickableInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EditProductAction extends AbstractController
{
    private MetadataInterface $metadata;

    private RequestConfigurationFactoryInterface $requestConfigurationFactory;

    private CreateProductListingCommandInterface $createProductListingCommand;

    private ProductDraftRepositoryInterface $productDraftRepository;

    public function __construct(
        MetadataInterface $metadata,
        RequestConfigurationFactoryInterface $requestConfigurationFactory,
        CreateProductListingCommandInterface $createProductListingCommand,
        ProductDraftRepositoryInterface $productDraftRepository,
        ) {
        $this->requestConfigurationFactory = $requestConfigurationFactory;
        $this->metadata = $metadata;
        $this->createProductListingCommand = $createProductListingCommand;
        $this->productDraftRepository = $productDraftRepository;
    }

    public function __invoke(Request $request): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);

        /** @var ProductDraftInterface $newResource */
        $newResource = $this->productDraftRepository->find($request->get('id'));

        if (!(ProductDraftInterface::STATUS_CREATED == $newResource->getStatus())) {
            $newResource = $this->createProductListingCommand->cloneProduct($newResource, false);
        }

        $form = $this->createForm(ProductType::class, $newResource);
        $form->handleRequest($request);

        if ($request->isMethod('POST') && $form->isSubmitted() && $form->isValid()) {
            /** @var ProductDraftInterface $productDraft */
            $productDraft = $form->getData();

            /** @var ClickableInterface $button */
            $button = $form->get('saveAndAdd');
            $this->createProductListingCommand->saveEdit($productDraft, $button->isClicked());

            if ($button->isClicked()) {
                $this->addFlash('success', 'bitbag_mvm_plugin.ui.product_listing_saved_and_sent_to_verification');
            } else {
                $this->addFlash('success', 'bitbag_mvm_plugin.ui.product_listing_saved');
            }

            return $this->redirectToRoute('bitbag_mvm_plugin_vendor_product_listing_index');
        }

        return new Response(
            $this->renderView('@BitBagSyliusMultiVendorMarketplacePlugin/Vendor/ProductListing/edit_product.html.twig', [
                'configuration' => $configuration,
                'metadata' => $this->metadata,
                'resource' => $newResource,
                $this->metadata->getName() => $newResource,
                'form' => $form->createView(),
            ])
        );
    }
}
