<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\DataTransformer;

use BitBag\OpenMarketplace\Api\Messenger\Command\ShopUserAwareInterface;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use Sylius\Bundle\ApiBundle\Context\UserContextInterface;
use Sylius\Bundle\ApiBundle\DataTransformer\CommandDataTransformerInterface;

final class ShopUserAwareInputCommandDataTransformer implements CommandDataTransformerInterface
{
    public function __construct(
        private UserContextInterface $userContext
    ) {
    }

    /**
     * @param ShopUserAwareInterface $object
     *
     * @return ShopUserAwareInterface
     */
    public function transform(
        $object,
        string $to,
        array $context = []
    ) {
        if (null !== $object->getShopUser()) {
            return $object;
        }

        $user = $this->userContext->getUser();
        if ($user instanceof ShopUserInterface) {
            $object->setShopUser($user);
        }

        return $object;
    }

    /**
     * @param ShopUserAwareInterface $object
     */
    public function supportsTransformation($object): bool
    {
        return $object instanceof ShopUserAwareInterface;
    }
}
