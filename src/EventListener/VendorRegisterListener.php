<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\EventListener;

use BitBag\OpenMarketplace\Component\Vendor\Entity\LogoImageInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\BackgroundImageInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Exception\ShopUserNotFoundException;
use BitBag\OpenMarketplace\Generator\VendorSlugGeneratorInterface;
use Sylius\Bundle\ResourceBundle\Event\ResourceControllerEvent;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Exception\TokenNotFoundException;

final class VendorRegisterListener
{
    private VendorSlugGeneratorInterface $vendorSlugGenerator;

    private ImageUploaderInterface $fileUploader;

    private TokenStorageInterface $tokenStorage;

    public function __construct(
        VendorSlugGeneratorInterface $vendorSlugGenerator,
        ImageUploaderInterface $fileUploader,
        TokenStorageInterface $tokenStorage,
        ) {
        $this->vendorSlugGenerator = $vendorSlugGenerator;
        $this->fileUploader = $fileUploader;
        $this->tokenStorage = $tokenStorage;
    }

    public function uploadImage(ResourceControllerEvent $event): void
    {
        /** @var VendorInterface $vendor */
        $vendor = $event->getSubject();

        /** @var LogoImageInterface $vendorImage */
        $vendorImage = $vendor->getImage();

        if (null !== $vendorImage) {
            $this->fileUploader->upload($vendorImage);

            $vendorImage->setOwner($vendor);
        }
    }

    public function uploadBackgroundImage(ResourceControllerEvent $event): void
    {
        /** @var VendorInterface $vendor */
        $vendor = $event->getSubject();

        /** @var BackgroundImageInterface $vendorBackgroundImage */
        $vendorBackgroundImage = $vendor->getBackgroundImage();

        if (null !== $vendorBackgroundImage) {
            $this->fileUploader->upload($vendorBackgroundImage);

            $vendorBackgroundImage->setOwner($vendor);
        }
    }

    public function generateSlug(ResourceControllerEvent $event): void
    {
        /** @var VendorInterface $vendor */
        $vendor = $event->getSubject();

        if (null === $vendor->getCompanyName()) {
            throw new \Exception('Company name cannot be empty.');
        }

        $vendor->setSlug($this->vendorSlugGenerator->generateSlug($vendor->getCompanyName()));
    }

    public function connectShopUser(ResourceControllerEvent $event): void
    {
        /** @var VendorInterface $vendor */
        $vendor = $event->getSubject();
        $token = $this->tokenStorage->getToken();
        if (null === $token) {
            throw new TokenNotFoundException();
        }
        /** @var ShopUserInterface|null $shopUser */
        $shopUser = $token->getUser();
        if (null === $shopUser) {
            throw new ShopUserNotFoundException();
        }
        $vendor->setShopUser($shopUser);
    }
}
