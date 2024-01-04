<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Settlement\Controller\Action;

use BitBag\OpenMarketplace\Component\Channel\Repository\ChannelRepositoryInterface;
use BitBag\OpenMarketplace\Component\Core\Api\Context\VendorContextInterface;
use BitBag\OpenMarketplace\Component\Core\Settlement\Exception\NotEnoughFundsException;
use BitBag\OpenMarketplace\Component\Core\Settlement\Form\ProfitWithdrawalType;
use BitBag\OpenMarketplace\Component\Settlement\Creator\SettlementCreatorInterface;
use BitBag\OpenMarketplace\Component\Settlement\Manager\VirtualWalletManagerInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Resource\Metadata\MetadataInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Twig\Environment;
use Webmozart\Assert\Assert;

final class ProfitWithdrawalAction
{
    public function __construct(
        private MetadataInterface $metadata,
        private VendorContextInterface $vendorContext,
        private FormFactoryInterface $formFactory,
        private RequestStack $requestStack,
        private RouterInterface $router,
        private Environment $twig,
        private SettlementCreatorInterface $settlementCreator,
        private ChannelRepositoryInterface $channelRepository,
        private VirtualWalletManagerInterface $virtualWalletManager,
        private EntityManagerInterface $entityManager,
        ) {
    }

    public function __invoke(Request $request): Response
    {
        $form = $this->formFactory->create(ProfitWithdrawalType::class);

        $form->handleRequest($request);

        $channelCode = $request->get('channelCode');
        Assert::notNull($channelCode);

        $channel = $this->channelRepository->findOneByCode($channelCode);
        Assert::isInstanceOf($channel, ChannelInterface::class);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return new Response(
                $this->twig->render('Context/Vendor/Settlement/create.html.twig', [
                    'form' => $form->createView(),
                    'metadata' => $this->metadata,
                    'channel' => $channel,
                ])
            );
        }

        $vendor = $this->vendorContext->getVendor();
        Assert::isInstanceOf($vendor, VendorInterface::class);

        $totalAmount = $this->getTotalAmount($form);

        $settlement = $this->settlementCreator->createSettlementForVendorAndChannelAndAmount(
            $vendor,
            $channel,
            $totalAmount,
            false
        );

        try {
            $this->virtualWalletManager->withdraw($settlement);
        } catch (NotEnoughFundsException) {
            $this->addFlash('error', 'open_marketplace.ui.not_enough_balance');

            return new RedirectResponse($this->router->generate('open_marketplace_vendor_virtual_wallet_index'));
        }

        $this->entityManager->flush();

        $this->addFlash('success', 'open_marketplace.ui.settlement_created');

        return new RedirectResponse($this->router->generate('open_marketplace_vendor_virtual_wallet_index'));
    }

    private function addFlash(string $type, string $message): void
    {
        $session = $this->requestStack->getSession();

        $flashbag = $session->getFlashBag();

        $flashbag->add($type, $message);
    }

    private function getTotalAmount(FormInterface $form): int
    {
        $totalAmount = $form->get('totalAmount')->getData();
        Assert::notNull($totalAmount);

        return (int) floor($totalAmount * 100);
    }
}
