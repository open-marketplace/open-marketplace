<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Vendor\Controller\Profile;

use BitBag\OpenMarketplace\Component\Core\Vendor\Security\Voter\TokenOwningVoter;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate\ProfileUpdate;
use BitBag\OpenMarketplace\Component\Vendor\Profile\ProfileUpdaterInterface;
use BitBag\OpenMarketplace\Provider\VendorProvider;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

final class ConfirmUpdateAction
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private ProfileUpdaterInterface $vendorProfileUpdateService,
        private AuthorizationCheckerInterface $security,
        private RouterInterface $router,
        private VendorProvider $vendorProvider
    ) {
    }

    public function __invoke(string $token): Response
    {
        $vendorProfileUpdateData = $this->entityManager->getRepository(ProfileUpdate::class)->findOneBy(['token' => $token]);
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
