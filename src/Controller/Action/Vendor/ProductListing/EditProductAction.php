<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Controller\Action\Vendor\ProductListing;

use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListingInterface;
use BitBag\OpenMarketplace\Factory\ProductListingFromDraftFactoryInterface;
use BitBag\OpenMarketplace\Form\ProductListing\ProductType;
use BitBag\OpenMarketplace\Repository\ProductListing\ProductDraftRepositoryInterface;
use BitBag\OpenMarketplace\Repository\ProductListing\ProductListingRepositoryInterface;
use BitBag\OpenMarketplace\Security\Voter\ObjectOwningVoter;
use Sylius\Bundle\ResourceBundle\Controller\RequestConfigurationFactoryInterface;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Sylius\Component\Resource\Metadata\MetadataInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Twig\Environment;

final class EditProductAction
{
    private MetadataInterface $metadata;

    private RequestConfigurationFactoryInterface $requestConfigurationFactory;

    private ProductDraftRepositoryInterface $productDraftRepository;

    private ProductListingFromDraftFactoryInterface $productListingFromDraftFactory;

    private ImageUploaderInterface $imageUploader;

    private ProductListingRepositoryInterface $productListingRepository;

    private AuthorizationCheckerInterface $authorizationChecker;

    private FormFactoryInterface $formFactory;

    private RequestStack $requestStack;

    private Environment $twig;

    private RouterInterface $router;

    public function __construct(
        MetadataInterface $metadata,
        RequestConfigurationFactoryInterface $requestConfigurationFactory,
        ProductDraftRepositoryInterface $productDraftRepository,
        ProductListingFromDraftFactoryInterface $productListingFromDraftFactory,
        ImageUploaderInterface $imageUploader,
        ProductListingRepositoryInterface $productListingRepository,
        AuthorizationCheckerInterface $authorizationChecker,
        FormFactoryInterface $formFactory,
        RequestStack $requestStack,
        Environment $twig,
        RouterInterface $router,
    ) {
        $this->metadata = $metadata;
        $this->requestConfigurationFactory = $requestConfigurationFactory;
        $this->productDraftRepository = $productDraftRepository;
        $this->productListingFromDraftFactory = $productListingFromDraftFactory;
        $this->imageUploader = $imageUploader;
        $this->productListingRepository = $productListingRepository;
        $this->authorizationChecker = $authorizationChecker;
        $this->formFactory = $formFactory;
        $this->requestStack = $requestStack;
        $this->twig = $twig;
        $this->router = $router;
    }

    public function __invoke(Request $request): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);

        /** @var ProductListingInterface $productListing */
        $productListing = $this->productListingRepository->find($request->get('id'));

        if (!$this->authorizationChecker->isGranted(ObjectOwningVoter::OWNIT, $productListing)) {
            throw new AccessDeniedException();
        }

        $productDraft = $this->productListingFromDraftFactory->getLatestDraft($productListing);

        $form = $this->formFactory->create(ProductType::class, $productDraft);
        $form->handleRequest($request);

        if ($request->isMethod('POST') && $form->isSubmitted() && $form->isValid()) {
            $this->productListingFromDraftFactory->rejoinRelations($productDraft);
            $this->productDraftRepository->save($productDraft);

            /** @var Session $session */
            $session = $this->requestStack->getSession();
            $session->getFlashBag()->add('success', 'open_marketplace.ui.product_listing_saved');

            return new RedirectResponse($this->router->generate('open_marketplace_vendor_product_listing_index'));
        }

        return new Response(
            $this->twig->render('Vendor/ProductListing/update_form.html.twig', [
                'configuration' => $configuration,
                'metadata' => $this->metadata,
                'resource' => $productDraft,
                $this->metadata->getName() => $productDraft,
                'form' => $form->createView(),
            ])
        );
    }
}
