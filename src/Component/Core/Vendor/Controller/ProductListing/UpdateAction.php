<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Vendor\Controller\ProductListing;

use BitBag\OpenMarketplace\Component\Core\Common\Security\Voter\ObjectOwningVoter;
use BitBag\OpenMarketplace\Component\Core\Vendor\Form\Type\ProductListing\ListingType;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingInterface;
use BitBag\OpenMarketplace\Component\ProductListing\ListingPersisterInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Repository\DraftRepositoryInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Repository\ListingRepositoryInterface;
use Sylius\Bundle\ResourceBundle\Controller\RequestConfigurationFactoryInterface;
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

final class UpdateAction
{
    public function __construct(
        private MetadataInterface $metadata,
        private RequestConfigurationFactoryInterface $requestConfigurationFactory,
        private DraftRepositoryInterface $productDraftRepository,
        private ListingPersisterInterface $listingPersister,
        private ListingRepositoryInterface $productListingRepository,
        private AuthorizationCheckerInterface $authorizationChecker,
        private FormFactoryInterface $formFactory,
        private RequestStack $requestStack,
        private Environment $twig,
        private RouterInterface $router,
        ) {
    }

    public function __invoke(Request $request): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);

        /** @var ListingInterface $productListing */
        $productListing = $this->productListingRepository->find($request->get('id'));

        if (!$this->authorizationChecker->isGranted(ObjectOwningVoter::OWNIT, $productListing)) {
            throw new AccessDeniedException();
        }

        if ($productListing->isRemoved()) {
            /** @var Session $session */
            $session = $this->requestStack->getSession();
            $session->getFlashBag()->add('error', 'open_marketplace.ui.product_listing_removed');
            return new RedirectResponse($this->router->generate('open_marketplace_vendor_product_listings_index'));
        }

        $productDraft = $this->listingPersister->resolveLatestDraft($productListing);

        $form = $this->formFactory->create(ListingType::class, $productDraft);
        $form->handleRequest($request);

        if ($request->isMethod('POST') && $form->isSubmitted() && $form->isValid()) {
            $productDraft->ownRelations();
            $this->listingPersister->uploadImages($productDraft);

            $this->productDraftRepository->save($productDraft);

            /** @var Session $session */
            $session = $this->requestStack->getSession();
            $session->getFlashBag()->add('success', 'open_marketplace.ui.product_listing_saved');

            return new RedirectResponse($this->router->generate('open_marketplace_vendor_product_listings_index'));
        }

        return new Response(
            $this->twig->render('Context/Vendor/ProductListing/update.html.twig', [
                'configuration' => $configuration,
                'metadata' => $this->metadata,
                'resource' => $productDraft,
                $this->metadata->getName() => $productDraft,
                'form' => $form->createView(),
            ])
        );
    }
}
