<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Serializer;

use BitBag\OpenMarketplace\Entity\ProductListing\ProductListing;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Normalizer\ContextAwareDenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;

final class ProductListingDoctrineCollectionDenormalizer implements ContextAwareDenormalizerInterface, DenormalizerAwareInterface
{
    use DenormalizerAwareTrait;

    private array $collectionAttributes = [
        'images',
        'translations',
        'productListingPrice',
        'attributes',
        'productDraftTaxons',
    ];

    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        foreach ($data as $key=>$item) {
            if (in_array($key, $this->collectionAttributes) && is_array($item) && !is_a($item, Collection::class)) {
                $data[$key] = new ArrayCollection($item);
            }
        }
        return $this->denormalizer->denormalize($data, $class, $format, $context + [__CLASS__ => true]);
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return \in_array($format, ['json', 'jsonld'], true) &&
            is_a($type, ProductListing::class, true) &&
            'shop_account:product_listing:create' === $context['groups'] &&
            !isset($context[__CLASS__]);
    }
}