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
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Core\Model\AdminUserInterface;
use Sylius\Component\Core\Model\ShopUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class Conversation implements ConversationInterface
{
    public const STATUS_OPEN = 'open';

    public const STATUS_CLOSED = 'closed';

    protected ?int $id = null;

    protected ?CategoryInterface $category = null;

    protected ?ShopUserInterface $shopUser = null;

    protected ?VendorInterface $vendorUser = null;

    protected AdminUserInterface $adminUser;

    /** @var ?Collection<int, MessageInterface> */
    protected ?Collection $messages = null;

    protected string $status = self::STATUS_OPEN;

    public function __construct()
    {
        $this->messages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?CategoryInterface
    {
        return $this->category;
    }

    public function setCategory(?CategoryInterface $category): void
    {
        $this->category = $category;
    }

    public function getApplicant(): ?UserInterface
    {
        return $this->getShopUser();
    }

    public function setApplicant(VendorInterface $vendor): void
    {
        $this->setVendorUser($vendor);
    }

    public function getAdminUser(): AdminUserInterface
    {
        return $this->adminUser;
    }

    public function setAdminUser(AdminUserInterface $adminUser): void
    {
        $this->adminUser = $adminUser;
    }

    public function addMessage(MessageInterface $message): void
    {
        if (null == $this->messages) {
            $this->messages = new ArrayCollection();
        }
        $this->messages->add($message);
        $message->setConversation($this);
    }

    public function removeMessage(MessageInterface $message): void
    {
        if (null !== $this->messages) {
            $this->messages->removeElement($message);
        }
    }

    /** @return ?Collection<int, MessageInterface>  */
    public function getMessages(): ?Collection
    {
        return $this->messages;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /** @param ?Collection<int, MessageInterface> $messages  */
    public function setMessages(?Collection $messages): void
    {
        $this->messages = $messages;
    }

    public function getShopUser(): ?ShopUserInterface
    {
        return $this->shopUser;
    }

    public function setShopUser(?ShopUserInterface $shopUser): void
    {
        $this->shopUser = $shopUser;
    }

    public function getVendorUser(): ?VendorInterface
    {
        return $this->vendorUser;
    }

    public function setVendorUser(?VendorInterface $vendorUser): void
    {
        $this->vendorUser = $vendorUser;
    }

    public function isClosed(): bool
    {
        return self::STATUS_CLOSED === $this->status;
    }

    public function isOpen(): bool
    {
        return !$this->isClosed();
    }
}
