<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller;

use Sylius\Component\Core\Model\AdminUserInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

abstract class AbstractController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    protected function isAssetsVendorUser(): bool
    {
        return $this->getUser() && (method_exists($this->getUser(), 'getCustomer')) && $this->getUser()->getCustomer()->getVendor();
    }

    protected function notAssetsVendorUserRedirect(): RedirectResponse
    {
        return $this->redirectToRoute('sylius_shop_account_dashboard');
    }

    protected function isAssetsAdmin(): bool
    {
        return $this->getUser() instanceof AdminUserInterface;
    }

    protected function isAssetsUser(): bool
    {
        return $this->isAssetsVendorUser() || $this->isAssetsAdmin();
    }
}
