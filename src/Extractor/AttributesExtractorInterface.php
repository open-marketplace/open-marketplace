<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Extractor;

use Doctrine\Common\Collections\Collection;
use Sylius\Component\Attribute\Model\AttributeInterface;
use Sylius\Component\Attribute\Model\AttributeValueInterface;

interface AttributesExtractorInterface
{
    /**
     * @param Collection<int, AttributeValueInterface> $productDraftAttributeValues
     *
     * @return array<int, AttributeInterface|null>
     */
    public function extract(Collection $productDraftAttributeValues): array;
}
