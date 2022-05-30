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
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

final class ConfirmProfileUpdateAction extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private VendorProfileUpdateService $vendorProfileUpdateService;

    public function __construct(EntityManagerInterface $entityManager, VendorProfileUpdateService $vendorProfileUpdateService)
    {
        $this->entityManager = $entityManager;
        $this->vendorProfileUpdateService = $vendorProfileUpdateService;
    }

    public function __invoke(string $token): Response
    {                
        $vendorProfileUpdateData = $this->entityManager->getRepository(VendorProfileUpdate::class)->findOneByToken($token);

        $this->denyAccessUnlessGranted(TokenOwningVoter::UPDATE, $vendorProfileUpdateData);
        
        $this->vendorProfileUpdateService->updateVendorFromPendingData($vendorProfileUpdateData);
        
        return new RedirectResponse('vendor_profile');
    }
}
