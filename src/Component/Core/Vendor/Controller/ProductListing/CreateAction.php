<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Vendor\Controller\ProductListing;

use BitBag\OpenMarketplace\Component\Core\Vendor\Form\Type\ProductListing\ListingType;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\ListingPersisterInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Repository\DraftRepositoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
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

final class CreateAction
{
    public function __construct(
        private MetadataInterface $metadata,
        private RequestConfigurationFactoryInterface $requestConfigurationFactory,
        private NewResourceFactoryInterface $newResourceFactory,
        private FactoryInterface $factory,
        private ListingPersisterInterface $listingPersister,
        private DraftRepositoryInterface $productDraftRepository,
        private FormFactoryInterface $formFactory,
        private RequestStack $requestStack,
        private RouterInterface $router,
        private Environment $twig,
        private TokenStorageInterface $tokenStorage,
    ) {
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

        /** @var DraftInterface $productDraft */
        $productDraft = $this->newResourceFactory->create($configuration, $this->factory);

        $form = $this->formFactory->create(ListingType::class, $productDraft);
        $form->handleRequest($request);

        if ($request->isMethod('POST') && $form->isSubmitted() && $form->isValid()) {
            $this->listingPersister->createNewProductListing($productDraft, $vendor);
            $this->productDraftRepository->save($productDraft);

            /** @var Session $session */
            $session = $this->requestStack->getSession();
            $session->getFlashBag()->add('success', 'open_marketplace.ui.product_listing_created');

            return new RedirectResponse($this->router->generate('open_marketplace_vendor_product_listing_index'));
        }

        return new Response(
            $this->twig->render('Context/Vendor/ProductListing/create.html.twig', [
                'configuration' => $configuration,
                'metadata' => $this->metadata,
                'resource' => $productDraft,
                $this->metadata->getName() => $productDraft,
                'form' => $form->createView(),
            ])
        );
    }
}
