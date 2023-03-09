<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Controller\Action\Vendor;

use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Repository\ProductRepositoryInterface;
use BitBag\OpenMarketplace\Repository\VendorRepositoryInterface;
use Sylius\Component\Channel\Context\ChannelContextInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Twig\Environment;

final class ShowVendorPageAction
{
    private VendorRepositoryInterface $vendorRepository;

    private ProductRepositoryInterface $productRepository;

    private ChannelContextInterface $channelContext;

    private RouterInterface $router;

    private Environment $twig;

    public function __construct(
        VendorRepositoryInterface $vendorRepository,
        ProductRepositoryInterface $productRepository,
        ChannelContextInterface $channelContext,
        RouterInterface $router,
        Environment $twig,
        ) {
        $this->vendorRepository = $vendorRepository;
        $this->productRepository = $productRepository;
        $this->channelContext = $channelContext;
        $this->router = $router;
        $this->twig = $twig;
    }

    public function __invoke(Request $request): Response
    {
        /** @var VendorInterface $vendor */
        $vendor = $this->vendorRepository->findOneBy(['slug' => $request->attributes->get('slug')]);

        if (VendorInterface::STATUS_UNVERIFIED === $vendor->getStatus()) {
            return new RedirectResponse($this->router->generate('sylius_shop_homepage'));
        }

        $channel = $this->channelContext->getChannel();
        $paginator = $this->productRepository->findVendorProducts($vendor, $request, $channel);

        return new Response($this->twig->render('Vendor/vendor_page.html.twig', [
            'vendor' => $vendor,
            'paginator' => $paginator,
        ]));
    }
}
