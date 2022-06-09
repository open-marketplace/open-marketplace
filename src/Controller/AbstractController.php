<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller;

use Sylius\Component\Core\Model\AdminUserInterface;
use Sylius\Component\Core\Model\ShopUserInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

abstract class AbstractController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    protected function isAssetsVendorUser(): bool
    {
        $user = $this->getUser();
        if ($user instanceof ShopUserInterface) {
            return ($this->getUser()->getCustomer()->getVendor());
        }
    }

    protected function redirectUserNotAccess(): RedirectResponse
    {
        return $this->redirectToRoute('sylius_shop_account_dashboard');
    }

    protected function isAssetsAdmin(): bool
    {
        return $this->getUser() instanceof AdminUserInterface;
    }

    protected function isAssetsUser(): bool
    {
        return ($this->isAssetsAdmin() || $this->isAssetsVendorUser());
    }
}
