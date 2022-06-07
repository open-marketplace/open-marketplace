<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorFactory;
use BitBag\SyliusMultiVendorMarketplacePlugin\Form\VendorType;
use BitBag\SyliusMultiVendorMarketplacePlugin\Service\VendorProfileUpdateService;
use BitBag\SyliusMultiVendorMarketplacePlugin\Service\VendorProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

final class VendorProfileUpdateAction 
{
    private RequestStack $request;

    private VendorProfileUpdateService $vendorProfileUpdateService;

    private VendorProvider $vendorProvider;
    
    private FormFactory $formFactory;
    
    private Router $router;
    
    private VendorFactory $vendorFactory;

    public function __construct(
        RequestStack $request,
        VendorProfileUpdateService $vendorProfileUpdateService,
        VendorProvider $vendorProvider,
        FormFactory $formFactory,
        Router $router,
        VendorFactory $vendorFactory
    ) {
        $this->request = $request;
        $this->vendorProfileUpdateService = $vendorProfileUpdateService;
        $this->vendorProvider = $vendorProvider;
        $this->formFactory = $formFactory;
        $this->router = $router;
        $this->vendorFactory = $vendorFactory;
    }

    public function __invoke(): Response
    {
        $profilePath = $this->router->generate('vendor_profile');
        $vendor = $this->vendorFactory->createNew();
        $form = $this->formFactory->create(VendorType::class, $vendor);

        $form->handleRequest($this->request->getCurrentRequest());
        if ($form->isSubmitted() && $form->isValid()) {
            $this->vendorProfileUpdateService->createPendingVendorProfileUpdate(
                $form->getData(), 
                $this->vendorProvider->provideCurrentVendor()
            );
        }

        return new RedirectResponse($profilePath);
    }
}
