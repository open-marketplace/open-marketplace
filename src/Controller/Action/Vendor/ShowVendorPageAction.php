<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Vendor;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductRepositoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\VendorRepositoryInterface;
use Sylius\Component\Channel\Context\ChannelContextInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ShowVendorPageAction extends AbstractController
{
    private VendorRepositoryInterface $vendorRepository;

    private ProductRepositoryInterface $productRepository;

    private ChannelContextInterface $channelContext;

    public function __construct(
        VendorRepositoryInterface $vendorRepository,
        ProductRepositoryInterface $productRepository,
        ChannelContextInterface $channelContext
    ) {
        $this->vendorRepository = $vendorRepository;
        $this->productRepository = $productRepository;
        $this->channelContext = $channelContext;
    }

    public function __invoke(Request $request): Response
    {
        /** @var VendorInterface $vendor */
        $vendor = $this->vendorRepository->findOneBy(['slug' => $request->attributes->get('slug')]);

        if (VendorInterface::STATUS_UNVERIFIED === $vendor->getStatus()) {
            return $this->redirectToRoute('sylius_shop_homepage');
        }

        $channel = $this->channelContext->getChannel();
        $paginator = $this->productRepository->findVendorProducts($vendor, $request, $channel);

        return $this->render('@BitBagSyliusMultiVendorMarketplacePlugin/vendor/vendor_page.html.twig', [
            'vendor' => $vendor,
            'paginator' => $paginator,
        ]);
    }
}
