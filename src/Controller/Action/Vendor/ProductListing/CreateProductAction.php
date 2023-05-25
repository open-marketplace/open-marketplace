<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Controller\Action\Vendor\ProductListing;

use BitBag\OpenMarketplace\Component\ProductListing\ProductListingAdministrationToolInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Form\ProductListing\ProductType;
use BitBag\OpenMarketplace\Repository\ProductListing\ProductDraftRepositoryInterface;
use Sylius\Bundle\ResourceBundle\Controller\NewResourceFactoryInterface;
use Sylius\Bundle\ResourceBundle\Controller\RequestConfigurationFactoryInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Metadata\MetadataInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Twig\Environment;
use Webmozart\Assert\Assert;

final class CreateProductAction
{
    private MetadataInterface $metadata;

    private RequestConfigurationFactoryInterface $requestConfigurationFactory;

    private NewResourceFactoryInterface $newResourceFactory;

    private FactoryInterface $factory;

    private ProductListingAdministrationToolInterface $productListingAdministrationTool;

    private ProductDraftRepositoryInterface $productDraftRepository;

    private FormFactoryInterface $formFactory;

    private RequestStack $requestStack;

    private RouterInterface $router;

    private Environment $twig;

    private TokenStorageInterface $tokenStorage;

    public function __construct(
        MetadataInterface $metadata,
        RequestConfigurationFactoryInterface $requestConfigurationFactory,
        NewResourceFactoryInterface $newResourceFactory,
        FactoryInterface $factory,
        ProductListingAdministrationToolInterface $productListingAdministrationTool,
        ProductDraftRepositoryInterface $productDraftRepository,
        FormFactoryInterface $formFactory,
        RequestStack $requestStack,
        RouterInterface $router,
        Environment $twig,
        TokenStorageInterface $tokenStorage,
    ) {
        $this->metadata = $metadata;
        $this->requestConfigurationFactory = $requestConfigurationFactory;
        $this->newResourceFactory = $newResourceFactory;
        $this->factory = $factory;
        $this->productListingAdministrationTool = $productListingAdministrationTool;
        $this->productDraftRepository = $productDraftRepository;
        $this->formFactory = $formFactory;
        $this->requestStack = $requestStack;
        $this->router = $router;
        $this->twig = $twig;
        $this->tokenStorage = $tokenStorage;
    }

    public function __invoke(Request $request): Response
    {
        /** @var TokenInterface $token */
        $token = $this->tokenStorage->getToken();

        /** @var ShopUserInterface $user */
        $user = $token->getUser();

        $vendor = $user->getVendor();
        Assert::isInstanceOf($vendor, VendorInterface::class);

        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);

        /** @var ProductDraftInterface $productDraft */
        $productDraft = $this->newResourceFactory->create($configuration, $this->factory);

        $form = $this->formFactory->create(ProductType::class, $productDraft);
        $form->handleRequest($request);

        if ($request->isMethod('POST') && $form->isSubmitted() && $form->isValid()) {
            $this->productListingAdministrationTool->createNewProductListing($productDraft, $vendor);
            $this->productDraftRepository->save($productDraft);

            /** @var Session $session */
            $session = $this->requestStack->getSession();
            $session->getFlashBag()->add('success', 'open_marketplace.ui.product_listing_created');

            return new RedirectResponse($this->router->generate('open_marketplace_vendor_product_listing_index'));
        }

        return new Response(
            $this->twig->render('Vendor/ProductListing/create_form.html.twig', [
                'configuration' => $configuration,
                'metadata' => $this->metadata,
                'resource' => $productDraft,
                $this->metadata->getName() => $productDraft,
                'form' => $form->createView(),
            ])
        );
    }
}
