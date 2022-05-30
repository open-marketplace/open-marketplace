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
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListing;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Form\ProductListing\ProductType;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing\ProductDraftRepositoryInterface;
use Sylius\Bundle\ResourceBundle\Controller\EventDispatcherInterface;
use Sylius\Bundle\ResourceBundle\Controller\FlashHelperInterface;
use Sylius\Bundle\ResourceBundle\Controller\NewResourceFactoryInterface;
use Sylius\Bundle\ResourceBundle\Controller\RedirectHandlerInterface;
use Sylius\Bundle\ResourceBundle\Controller\RequestConfigurationFactoryInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Metadata\MetadataInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Sylius\Component\Resource\ResourceActions;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
        ProductDraftRepositoryInterface $productDraftRepository
)
    {
        $this->requestConfigurationFactory = $requestConfigurationFactory;
        $this->metadata = $metadata;
        $this->createProductListingCommand = $createProductListingCommand;
        $this->productDraftRepository = $productDraftRepository;
    }

    public function __invoke(Request $request): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);

        $newResource = $this->productDraftRepository->find($request->get('id'));
        $form = $this->createForm(ProductType::class, $newResource);
        $form->handleRequest($request);
        if ($request->isMethod('POST') && $form->isSubmitted() && $form->isValid()) {
            /** @var ProductDraftInterface $productDraft */
            $productDraft = $form->getData();

            $this->createProductListingCommand->editAndCreate($productDraft, $form->get('saveAndAdd')->isClicked());

            return $this->redirectToRoute('bitbag_sylius_multi_vendor_marketplace_plugin_vendor_product_listing_index');
        }
        return new Response(
            $this->renderView('@BitBagSyliusMultiVendorMarketplacePlugin/Vendor/ProductListing/create_product.html.twig', [
                'configuration' => $configuration,
                'metadata' => $this->metadata,
                'resource' => $newResource,
                $this->metadata->getName() => $newResource,
                'form' => $form->createView(),
            ])
        );
    }


}

