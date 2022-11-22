<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\DataTransformer;

use BitBag\OpenMarketplace\Api\Messenger\Command\VendorSlugAwareInterface;
use BitBag\OpenMarketplace\Generator\VendorSlugGeneratorInterface;
use Sylius\Bundle\ApiBundle\DataTransformer\CommandDataTransformerInterface;

final class VendorSlugAwareInputCommandDataTransformer implements CommandDataTransformerInterface
{
    public function __construct(
        private VendorSlugGeneratorInterface $vendorSlugGenerator
    ) {
    }

    /**
     * @param VendorSlugAwareInterface $object
     *
     * @return VendorSlugAwareInterface
     */
    public function transform(
        $object,
        string $to,
        array $context = []
    ) {
        if (null === $object->getCompanyName()) {
            return $object;
        }

        $slug = $this->vendorSlugGenerator->generateSlug($object->getCompanyName());
        $object->setSlug($slug);

        return $object;
    }

    /**
     * @param VendorSlugAwareInterface $object
     */
    public function supportsTransformation($object): bool
    {
        return $object instanceof VendorSlugAwareInterface;
    }
}
