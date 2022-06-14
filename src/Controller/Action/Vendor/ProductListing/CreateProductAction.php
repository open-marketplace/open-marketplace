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
use Sylius\Bundle\ResourceBundle\Controller\EventDispatcherInterface;
use Sylius\Bundle\ResourceBundle\Controller\FlashHelperInterface;
use Sylius\Bundle\ResourceBundle\Controller\NewResourceFactoryInterface;
use Sylius\Bundle\ResourceBundle\Controller\RedirectHandlerInterface;
use Sylius\Bundle\ResourceBundle\Controller\RequestConfigurationFactoryInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Metadata\MetadataInterface;
use Sylius\Component\Resource\ResourceActions;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\ClickableInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CreateProductAction extends AbstractController
{
    private MetadataInterface $metadata;

    private RequestConfigurationFactoryInterface $requestConfigurationFactory;

    private NewResourceFactoryInterface $newResourceFactory;

    private FactoryInterface $factory;

    private CreateProductListingCommandInterface $createProductListingCommand;

    private RedirectHandlerInterface $redirectHandler;

    private FlashHelperInterface $flashHelper;

    private EventDispatcherInterface $eventDispatcher;

    public function __construct(
        MetadataInterface $metadata,
        RequestConfigurationFactoryInterface $requestConfigurationFactory,
        NewResourceFactoryInterface $newResourceFactory,
        FactoryInterface $factory,
        CreateProductListingCommandInterface $createProductListingCommand,
        RedirectHandlerInterface $redirectHandler,
        FlashHelperInterface $flashHelper,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->requestConfigurationFactory = $requestConfigurationFactory;
        $this->newResourceFactory = $newResourceFactory;
        $this->factory = $factory;
        $this->metadata = $metadata;
        $this->createProductListingCommand = $createProductListingCommand;
        $this->redirectHandler = $redirectHandler;
        $this->flashHelper = $flashHelper;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function __invoke(Request $request): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);

        $newResource = $this->newResourceFactory->create($configuration, $this->factory);

        $form = $this->createForm(ProductType::class, $newResource);

        $form->handleRequest($request);
        if ($request->isMethod('POST') && $form->isSubmitted() && $form->isValid()) {
            /** @var ProductDraftInterface $productDraft */
            $productDraft = $form->getData();

            $event = $this->eventDispatcher->dispatchPreEvent(ResourceActions::CREATE, $configuration, $newResource);

            if ($event->isStopped() && !$configuration->isHtmlRequest()) {
                throw new HttpException($event->getErrorCode(), $event->getMessage());
            }
            if ($event->isStopped()) {
                $this->flashHelper->addFlashFromEvent($configuration, $event);

                $eventResponse = $event->getResponse();
                if (null !== $eventResponse) {
                    return $eventResponse;
                }

                return $this->redirectHandler->redirectToIndex($configuration, $newResource);
            }

            /** @var ClickableInterface $button */
            $button = $form->get('saveAndAdd');
            $this->createProductListingCommand->create($productDraft, $button->isClicked());

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
