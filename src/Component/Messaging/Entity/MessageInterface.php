<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Messaging\Entity;

use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Sylius\Component\Core\Model\AdminUserInterface;
use Sylius\Component\Core\Model\ShopUserInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\User\Model\UserInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface MessageInterface extends ResourceInterface
{
    public function getContent(): string;

    public function setContent(string $content): void;

    public function getCreatedAt(): \DateTimeInterface;

    public function setCreatedAt(\DateTimeInterface $createdAt): void;

    public function getConversation(): ConversationInterface;

    public function setConversation(ConversationInterface $conversation): void;

    public function getAuthor(): ?UserInterface;

    public function setAuthor(UserInterface $user): void;

    public function getShopUser(): ?ShopUserInterface;

    public function setShopUser(?ShopUserInterface $shopUser): void;

    public function getVendorUser(): ?VendorInterface;

    public function setVendorUser(?VendorInterface $vendorUser): void;

    public function getAdminUser(): ?AdminUserInterface;

    public function setAdminUser(?AdminUserInterface $adminUser): void;

    public function getFilename(): ?string;

    public function setFilename(?string $filename): void;

    public function getFile(): ?UploadedFile;

    public function setFile(?UploadedFile $file): void;
}
