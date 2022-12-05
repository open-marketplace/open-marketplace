<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Repository\VendorRepositoryInterface;
use Ramsey\Uuid\UuidInterface;
use Sylius\Bundle\ApiBundle\Context\UserContextInterface;

final class VendorAccountItemDataProvider implements RestrictedDataProviderInterface, ItemDataProviderInterface
{
    private UserContextInterface $userContext;

    private VendorRepositoryInterface $vendorRepository;

    public function __construct(
        UserContextInterface $userContext,
        VendorRepositoryInterface $vendorRepository
    ) {
        $this->userContext = $userContext;
        $this->vendorRepository = $vendorRepository;
    }

    /**
     * @param UuidInterface $id
     */
    public function getItem(
        string $resourceClass,
        $id,
        string $operationName = null,
        array $context = []
    ) {
        if (!is_string($operationName) || !str_starts_with($operationName, 'shop_account')) {
            return $this->vendorRepository->findOneBy(['uuid' => $id]);
        }

        if ($this->isRequestedByRightVendor($id)) {
            return $this->vendorRepository->findOneBy(['uuid' => $id]);
        }

        return null;
    }

    public function supports(
        string $resourceClass,
        string $operationName = null,
        array $context = []
    ): bool {
        return is_a($resourceClass, VendorInterface::class, true);
    }

    public function isRequestedByRightVendor(UuidInterface $uuid): bool
    {
        /** @var ShopUserInterface|null $user */
        $user = $this->userContext->getUser();

        if (!$user instanceof ShopUserInterface) {
            return false;
        }

        if (null === $user->getVendor()) {
            return false;
        }

        /** @var UuidInterface $userVendorUuid */
        $userVendorUuid = $user->getVendor()->getUuid();

        return $uuid->equals($userVendorUuid);
    }
}
