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
use BitBag\SyliusMultiVendorMarketplacePlugin\Provider\VendorProvider;
use BitBag\SyliusMultiVendorMarketplacePlugin\Security\Voter\TokenOwningVoter;
use BitBag\SyliusMultiVendorMarketplacePlugin\Updater\VendorProfileUpdaterInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

final class ConfirmProfileUpdateAction
{
    private EntityManagerInterface $entityManager;

    private VendorProfileUpdaterInterface $vendorProfileUpdateService;

    private AuthorizationCheckerInterface $security;

    private RouterInterface $router;

    private VendorProvider $vendorProvider;

    public function __construct(
        EntityManagerInterface $entityManager,
        VendorProfileUpdaterInterface $vendorProfileUpdateService,
        AuthorizationCheckerInterface $security,
        RouterInterface $router,
        VendorProvider $vendorProvider
    ) {
        $this->entityManager = $entityManager;
        $this->vendorProfileUpdateService = $vendorProfileUpdateService;
        $this->security = $security;
        $this->router = $router;
        $this->vendorProvider = $vendorProvider;
    }

    public function __invoke(string $token): Response
    {
        $vendorProfileUpdateData = $this->entityManager->getRepository(VendorProfileUpdate::class)->findOneBy(['token' => $token]);
        $profileRoot = $this->router->generate('vendor_profile');
        $vendorIsGranted = $this->security->isGranted(TokenOwningVoter::UPDATE, $vendorProfileUpdateData);
        if ($vendorIsGranted && null !== $vendorProfileUpdateData) {
            $this->vendorProfileUpdateService->updateVendorFromPendingData($vendorProfileUpdateData);

            $loggedVendor = $this->vendorProvider->provideCurrentVendor();
            $loggedVendor->setEditedAt(null);
            $this->entityManager->flush();
        }

        return new RedirectResponse($profileRoot);
    }
}
