<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdate;
use BitBag\SyliusMultiVendorMarketplacePlugin\Security\Voter\TokenOwningVoter;
use BitBag\SyliusMultiVendorMarketplacePlugin\Service\VendorProfileUpdateService;
use BitBag\SyliusMultiVendorMarketplacePlugin\Service\VendorProvider;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class ConfirmProfileUpdateAction extends AbstractController
{
    private EntityManagerInterface $entityManager;

    private VendorProfileUpdateService $vendorProfileUpdateService;
    private VendorProvider $vendorProvider;

    public function __construct(EntityManagerInterface $entityManager, VendorProfileUpdateService $vendorProfileUpdateService, VendorProvider $vendorProvider)
    {
        $this->entityManager = $entityManager;
        $this->vendorProfileUpdateService = $vendorProfileUpdateService;
        $this->vendorProvider = $vendorProvider;
    }

    public function __invoke(string $token): Response
    {
        $vendorProfileUpdateData = $this->entityManager->getRepository(VendorProfileUpdate::class)->findOneBy(['token' => $token]);
        if (null == $vendorProfileUpdateData) {
            return $this->redirectToRoute('vendor_profile');
        }
        $this->denyAccessUnlessGranted(TokenOwningVoter::UPDATE, $vendorProfileUpdateData);

        $this->vendorProfileUpdateService->updateVendorFromPendingData($vendorProfileUpdateData);

        $loggedVendor = $this->vendorProvider->getLoggedVendor();
        $loggedVendor->setEditDate(null);
        $this->entityManager->flush();


        return $this->redirectToRoute('vendor_profile');
    }
}
