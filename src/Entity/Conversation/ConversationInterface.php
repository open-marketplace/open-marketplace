<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Conversation;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Core\Model\AdminUserInterface;
use Sylius\Component\Core\Model\ShopUserInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Symfony\Component\Security\Core\User\UserInterface;

interface ConversationInterface extends ResourceInterface
{
    public function getCategory(): ?CategoryInterface;

    public function setCategory(?CategoryInterface $category): void;

    public function getApplicant(): ?UserInterface;

    public function setApplicant(VendorInterface $vendor): void;

    public function getShopUser(): ?ShopUserInterface;

    public function setShopUser(?ShopUserInterface $shopUser): void;

    public function getVendorUser(): ?VendorInterface;

    public function setVendorUser(?VendorInterface $vendorUser): void;

    public function getAdminUser(): AdminUserInterface;

    public function setAdminUser(AdminUserInterface $adminUser): void;

    public function addMessage(MessageInterface $message): void;

    public function removeMessage(MessageInterface $message): void;

    /** @return  ?Collection<int, MessageInterface>  */
    public function getMessages(): ?Collection;

    /** @param ?Collection<int, MessageInterface> $messages  */
    public function setMessages(?Collection $messages): void;

    public function getStatus(): string;

    public function setStatus(string $status): void;

    public function isClosed(): bool;

    public function isOpen(): bool;
}
