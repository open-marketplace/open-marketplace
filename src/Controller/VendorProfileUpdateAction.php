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
use BitBag\SyliusMultiVendorMarketplacePlugin\Form\VendorType;
use BitBag\SyliusMultiVendorMarketplacePlugin\Service\VendorProfileUpdateService;
use BitBag\SyliusMultiVendorMarketplacePlugin\Service\VendorProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

class VendorProfileUpdateAction extends AbstractController
{
    private RequestStack $request;

    private VendorProfileUpdateService $vendorProfileUpdateService;

    private VendorProvider $vendorProvider;

    public function __construct(
        RequestStack $request,
        VendorProfileUpdateService $vendorProfileUpdateService,
        VendorProvider $vendorProvider
    )
    {
        $this->request = $request;
        $this->vendorProfileUpdateService = $vendorProfileUpdateService;
        $this->vendorProvider = $vendorProvider;
    }

    public function __invoke(): Response
    {        
        $vendor = new Vendor();
        $form = $this->createForm(VendorType::class, $vendor);
        
        $form->handleRequest($this->request->getCurrentRequest());
        if ($form->isSubmitted() && $form->isValid()) {
            $this->vendorProfileUpdateService->createPendingVendorProfileUpdate($form->getData(), $this->vendorProvider->getLoggedVendor());
        }

        return $this->redirectToRoute('vendor_profile');
    }
}
