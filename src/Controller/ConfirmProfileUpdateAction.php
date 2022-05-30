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
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ConfirmProfileUpdateAction extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function __invoke(string $token)
    {        
        
        $vendorProfileUpdateData = $this->entityManager->getRepository(VendorProfileUpdate::class)->findOneByToken($token);
//        dd($vendorProfileUpdateData);
        $this->denyAccessUnlessGranted('UPDATE', $vendorProfileUpdateData);
//        $this->doctrine->getRepository(VendorProfileUpdate::class);
        return new JsonResponse($vendorProfileUpdateData);
    }
}
