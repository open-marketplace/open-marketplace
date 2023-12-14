<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Api\DataTransformer;

use BitBag\OpenMarketplace\Component\Core\Api\Messenger\Command\Vendor\ProductListingAwareInterface;
use Sylius\Bundle\ApiBundle\DataTransformer\CommandDataTransformerInterface;

final class ProductListingAwareCommandDataTransformer implements CommandDataTransformerInterface
{
    /**
     * @param ProductListingAwareInterface $object
     *
     * @return ProductListingAwareInterface
     */
    public function transform(
        $object,
        string $to,
        array $context = []
    ) {
        if (null !== $object->getProductListing()) {
            return $object;
        }

        $productListing = $context['object_to_populate'];
        $object->setProductListing($productListing);

        return $object;
    }

    /** @param object $object */
    public function supportsTransformation($object): bool
    {
        return $object instanceof ProductListingAwareInterface;
    }
}
