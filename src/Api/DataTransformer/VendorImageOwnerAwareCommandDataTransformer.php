<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\DataTransformer;

use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\VendorImageOwnerAwareInterface;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use Sylius\Bundle\ApiBundle\Context\UserContextInterface;
use Sylius\Bundle\ApiBundle\DataTransformer\CommandDataTransformerInterface;

final class VendorImageOwnerAwareCommandDataTransformer implements CommandDataTransformerInterface
{
    private UserContextInterface $userContext;

    public function __construct(UserContextInterface $userContext)
    {
        $this->userContext = $userContext;
    }

    /**
     * @param VendorImageOwnerAwareInterface $object
     *
     * @return VendorImageOwnerAwareInterface
     */
    public function transform(
        $object,
        string $to,
        array $context = []
    ) {
        if (null !== $object->getOwner()) {
            return $object;
        }

        $shopUser = $this->userContext->getUser();
        if (!$shopUser instanceof ShopUserInterface) {
            return $object;
        }

        if (null !== $vendor = $shopUser->getVendor()) {
            $object->setOwner($vendor);
        }

        return $object;
    }

    /** @param object $object */
    public function supportsTransformation($object): bool
    {
        return $object instanceof VendorImageOwnerAwareInterface;
    }
}
