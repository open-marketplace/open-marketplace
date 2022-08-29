<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Admin\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Conversation\Conversation;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Conversation\ConversationInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Conversation\MessageInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Facade\Message\AddMessageFacadeInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Form\Type\Conversation\ConversationType;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\Conversation\ConversationRepositoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing\ProductDraftRepositoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing\ProductListingRepositoryInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Environment;

final class ShowAction
{
    private ProductListingRepositoryInterface $productListingRepository;

    private Environment $twig;

    private ProductDraftRepositoryInterface $productDraftRepository;

    private ConversationRepositoryInterface $conversationRepository;

    private FormFactoryInterface $formFactory;

    private AddMessageFacadeInterface $addMessageFacade;

    private RouterInterface $router;

    private TranslatorInterface $translator;

    public function __construct(
        ProductListingRepositoryInterface $productListingRepository,
        Environment $twig,
        ProductDraftRepositoryInterface $productDraftRepository,
        ConversationRepositoryInterface $conversationRepository,
        FormFactoryInterface $formFactory,
        AddMessageFacadeInterface $addMessageFacade,
        RouterInterface $router,
        TranslatorInterface $translator
    ) {
        $this->productListingRepository = $productListingRepository;
        $this->twig = $twig;
        $this->productDraftRepository = $productDraftRepository;
        $this->conversationRepository = $conversationRepository;
        $this->formFactory = $formFactory;
        $this->addMessageFacade = $addMessageFacade;

        $this->router = $router;
        $this->translator = $translator;
    }

    public function __invoke(Request $request): Response
    {
        /** @var ProductListingInterface $productListing */
        $productListing = $this->productListingRepository->find($request->attributes->get('id'));

        /** @var ProductDraftInterface $latestProductDraft */
        $latestProductDraft = $this->productDraftRepository->findLatestDraft($productListing);

        $conversation = new Conversation();

        $form = $this->formFactory->create(ConversationType::class, $conversation);

        $form->handleRequest($request);
        $draftViewURL = $this->router->generate(
            'bitbag_mvm_plugin_vendor_product_draft_show_product',
            ['id' => $latestProductDraft->getId()],
            UrlGenerator::ABSOLUTE_URL
        );

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var ConversationInterface $conversation */
            $conversation = $form->getData();
            $conversation->setShopUser($productListing->getVendor()->getShopUser());
            $conversation->setRejectedListingURL($draftViewURL);
            $this->conversationRepository->add($conversation);

            $this->addConversationWithMessages($conversation);

            return new RedirectResponse($this->router->generate(
                'bitbag_mvm_plugin_admin_product_listing_reject',
                ['id' => $request->attributes->get('id')]
            ));
        }

        return new Response(
            $this->twig->render('@BitBagSyliusMultiVendorMarketplacePlugin/Admin/ProductListing/show_product_listing.html.twig', [
                'productListing' => $productListing,
                'productDraft' => $latestProductDraft,
                'form' => $form->createView(),
            ])
        );
    }

    private function addConversationWithMessages(ConversationInterface $conversation): void
    {
        if (null !== $conversation->getMessages()) {
            /** @var MessageInterface $message */
            foreach ($conversation->getMessages()->toArray() as $message) {
                $this->addMessageFacade->createWithConversation(
                    $conversation->getId(),
                    $message,
                    $message->getFile(),
                );
            }
        }
    }
}
