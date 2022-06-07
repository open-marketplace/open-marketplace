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
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

class VendorProfileUpdateAction extends AbstractController
{
    private RequestStack $request;

    private VendorProfileUpdateService $vendorProfileUpdateService;

    private VendorProvider $vendorProvider;

    private EntityManager $manager;

    public function __construct(
        RequestStack $request,
        VendorProfileUpdateService $vendorProfileUpdateService,
        VendorProvider $vendorProvider,
        EntityManager $manager
    ) {
        $this->request = $request;
        $this->vendorProfileUpdateService = $vendorProfileUpdateService;
        $this->vendorProvider = $vendorProvider;
        $this->manager = $manager;
    }

    public function __invoke(): Response
    {
        $vendor = new Vendor();
        $form = $this->createForm(VendorType::class, $vendor);

        $form->handleRequest($this->request->getCurrentRequest());
        $loggedVendor = $this->vendorProvider->getLoggedVendor();
        if ($form->isSubmitted() && $form->isValid()) {
            $this->vendorProfileUpdateService->createPendingVendorProfileUpdate($form->getData(), $loggedVendor);
            $loggedVendor->setIsEdited(true);
            $this->manager->flush();
        }

        return $this->redirectToRoute('vendor_profile');
    }
}
