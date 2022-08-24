<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Vendor\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Action\StateMachine\Transition\ProductDraftStateMachineTransitionInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ProductListingFromDraftFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Form\ProductListing\ProductType;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing\ProductDraftRepositoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing\ProductListingRepositoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Transitions\ProductDraftTransitions;
use Sylius\Bundle\ResourceBundle\Controller\RequestConfigurationFactoryInterface;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Sylius\Component\Resource\Metadata\MetadataInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\ClickableInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EditProductAction extends AbstractController
{
    private MetadataInterface $metadata;

    private RequestConfigurationFactoryInterface $requestConfigurationFactory;

    private ProductDraftRepositoryInterface $productDraftRepository;

    private ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition;

    private ProductListingFromDraftFactoryInterface $productListingFromDraftFactory;

    private ImageUploaderInterface $imageUploader;

    private ProductListingRepositoryInterface $productListingRepository;

    public function __construct(
        MetadataInterface $metadata,
        RequestConfigurationFactoryInterface $requestConfigurationFactory,
        ProductDraftRepositoryInterface $productDraftRepository,
        ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition,
        ProductListingFromDraftFactoryInterface $productListingFromDraftFactory,
        ImageUploaderInterface $imageUploader,
        ProductListingRepositoryInterface $productListingRepository
    ) {
        $this->requestConfigurationFactory = $requestConfigurationFactory;
        $this->metadata = $metadata;
        $this->productDraftRepository = $productDraftRepository;
        $this->productDraftStateMachineTransition = $productDraftStateMachineTransition;
        $this->productListingFromDraftFactory = $productListingFromDraftFactory;
        $this->imageUploader = $imageUploader;
        $this->productListingRepository = $productListingRepository;
    }

    public function __invoke(Request $request): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);

        $listing = $this->productListingRepository->find($request->get('id'));

        /** @var ProductDraftInterface $newResource */
        $newResource = $this->productDraftRepository->findProductListingLatestProductDraft($listing);

        if (!(ProductDraftInterface::STATUS_CREATED === $newResource->getStatus())) {
            $newResource = $this->productListingFromDraftFactory->createClone($newResource);
        }

        $form = $this->createForm(ProductType::class, $newResource);

        $form->handleRequest($request);
        if ($request->isMethod('POST') && $form->isSubmitted() && $form->isValid()) {
            /** @var ProductDraftInterface $productDraft */
            $productDraft = $form->getData();

            foreach ($productDraft->getImages() as $image) {
                $image->setOwner($newResource);
                $this->imageUploader->upload($image);
            }
            foreach ($productDraft->getAttributes() as $attribute) {
                $attribute->setSubject($productDraft);
                $productDraft->addAttribute($attribute);
            }

            /** @var ClickableInterface $button */
            $button = $form->get('saveAndAdd');
            $productDraft = $this->productListingFromDraftFactory->saveEdit($productDraft);

            if ($button->isClicked()) {
                $this->productDraftStateMachineTransition->applyIfCan($productDraft, ProductDraftTransitions::TRANSITION_SEND_TO_VERIFICATION);
                $this->addFlash('success', 'bitbag_mvm_plugin.ui.product_listing_saved_and_sent_to_verification');
            } else {
                $this->productDraftRepository->save($productDraft);
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
