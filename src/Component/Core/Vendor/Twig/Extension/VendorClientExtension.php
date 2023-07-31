<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Vendor\Twig\Extension;

use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Repository\CustomerRepositoryInterface;
use Sylius\Component\Core\Model\CustomerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class VendorClientExtension extends AbstractExtension
{
    private CustomerRepositoryInterface $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('is_vendor_client', [$this, 'isVendorClient']),
        ];
    }

    public function isVendorClient(VendorInterface $vendor, CustomerInterface $customer): bool
    {
        $client = $this->customerRepository->findCustomerForVendor($vendor, (string) $customer->getId());

        return null !== $client;
    }
}
