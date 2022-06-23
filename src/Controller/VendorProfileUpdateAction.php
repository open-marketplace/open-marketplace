<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller;

use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorProfileFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Form\VendorType;
use BitBag\SyliusMultiVendorMarketplacePlugin\Provider\VendorProviderInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Updater\VendorProfileUpdaterInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;

final class VendorProfileUpdateAction
{
    private VendorProfileUpdaterInterface $vendorProfileUpdateService;

    private VendorProviderInterface $vendorProvider;

    private FormFactoryInterface $formFactory;

    private RouterInterface $router;

    private VendorProfileFactoryInterface $vendorFactory;

    public function __construct(
        VendorProfileUpdaterInterface $vendorProfileUpdateService,
        VendorProviderInterface $vendorProvider,
        FormFactoryInterface $formFactory,
        RouterInterface $router,
        VendorProfileFactoryInterface $vendorFactory
    ) {
        $this->vendorProfileUpdateService = $vendorProfileUpdateService;
        $this->vendorProvider = $vendorProvider;
        $this->formFactory = $formFactory;
        $this->router = $router;
        $this->vendorFactory = $vendorFactory;
    }

    public function __invoke(Request $request): Response
    {
        $profilePath = $this->router->generate('vendor_profile');
        $vendor = $this->vendorFactory->createNew();
        $form = $this->formFactory->create(VendorType::class, $vendor);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->vendorProfileUpdateService->createPendingVendorProfileUpdate(
                $form->getData(),
                $this->vendorProvider->provideCurrentVendor()
            );
        }

        return new RedirectResponse($profilePath);
    }
}
