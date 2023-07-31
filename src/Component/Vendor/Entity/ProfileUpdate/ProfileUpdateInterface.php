<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate;

use BitBag\OpenMarketplace\Component\Vendor\Entity\BackgroundImageInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\LogoImageInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileInterface as BaseProfileInterface;

interface ProfileUpdateInterface extends BaseProfileInterface
{
    public function getToken(): ?string;

    public function setToken(?string $token): void;

    public function getVendor(): VendorInterface;

    public function setVendor(VendorInterface $vendor): void;

    public function getImage(): ?LogoImageInterface;

    public function setImage(?LogoImageInterface $image): void;

    public function getBackgroundImage(): ?BackgroundImageInterface;

    public function setBackgroundImage(?BackgroundImageInterface $backgroundImage): void;
}
