<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Entity\Conversation;

use BitBag\OpenMarketplace\Entity\VendorInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Sylius\Component\Core\Model\AdminUserInterface;
use Sylius\Component\Core\Model\ShopUserInterface;
use Sylius\Component\User\Model\UserInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Message implements MessageInterface
{
    protected ?int $id = null;

    protected string $content;

    protected \DateTimeInterface $createdAt;

    protected ConversationInterface $conversation;

    protected ?string $filename = null;

    protected ?ShopUserInterface $shopUser = null;

    protected ?VendorInterface $vendorUser = null;

    protected ?AdminUserInterface $adminUser = null;

    protected ?UploadedFile $file = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getConversation(): ConversationInterface
    {
        return $this->conversation;
    }

    public function setConversation(ConversationInterface $conversation): void
    {
        $this->conversation = $conversation;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): void
    {
        $this->filename = $filename;
    }

    public function getAuthor(): ?UserInterface
    {
        $users = new ArrayCollection([
            $this->getAdminUser(),
            $this->getShopUser(),
        ]);

        foreach ($users as $user) {
            if (null !== $user) {
                return $user;
            }
        }

        return null;
    }

    public function setAuthor(UserInterface $user): void
    {
        if ($user instanceof AdminUserInterface) {
            $this->setAdminUser($user);

            return;
        }
        if ($user instanceof ShopUserInterface) {
            $this->setShopUser($user);
        }
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

    public function getAdminUser(): ?AdminUserInterface
    {
        return $this->adminUser;
    }

    public function setAdminUser(?AdminUserInterface $adminUser): void
    {
        $this->adminUser = $adminUser;
    }

    public function getFile(): ?UploadedFile
    {
        return $this->file;
    }

    public function setFile(?UploadedFile $file): void
    {
        $this->file = $file;
    }
}
