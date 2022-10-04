<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Entity;

interface VendorProfileUpdateInterface extends VendorProfileInterface
{
    public function getToken(): ?string;

    public function setToken(?string $token): void;

    public function getVendor(): VendorInterface;

    public function setVendor(VendorInterface $vendor): void;

    public function getImage(): ?VendorImageInterface;

    public function setImage(?VendorImageInterface $image): void;
}
