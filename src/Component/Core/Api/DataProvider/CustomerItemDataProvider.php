<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Api\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use BitBag\OpenMarketplace\Component\Core\Api\Context\VendorContextInterface;
use BitBag\OpenMarketplace\Component\Core\Api\SectionResolver\ShopVendorApiSection;
use BitBag\OpenMarketplace\Component\Vendor\Repository\CustomerRepositoryInterface;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionProviderInterface;

final class CustomerItemDataProvider implements ItemDataProviderInterface, RestrictedDataProviderInterface
{
    public function __construct(
        private ItemDataProviderInterface $baseCustomerItemDataProvider,
        private CustomerRepositoryInterface $customerRepository,
        private SectionProviderInterface $sectionProvider,
        private VendorContextInterface $vendorContext
    ) {
    }

    public function getItem(
        string $resourceClass,
        $id,
        string $operationName = null,
        array $context = []
    ) {
        $section = $this->sectionProvider->getSection();
        $vendor = $this->vendorContext->getVendor();
        if (null !== $vendor && $section instanceof ShopVendorApiSection) {
            /** @phpstan-ignore-next-line function strval() is risky */
            return $this->customerRepository->findCustomerForVendor($vendor, (string) $id);
        }

        return $this->baseCustomerItemDataProvider->getItem($resourceClass, $id, $operationName, $context);
    }

    public function supports(
        string $resourceClass,
        string $operationName = null,
        array $context = []
    ): bool {
        /** @phpstan-ignore-next-line BaseCustomerItemDataProvider doesn't have interface */
        return $this->baseCustomerItemDataProvider->supports($resourceClass, $operationName, $context);
    }
}
