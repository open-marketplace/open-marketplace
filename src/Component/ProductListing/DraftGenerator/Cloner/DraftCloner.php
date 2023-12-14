<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Cloner;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;

final class DraftCloner implements DraftClonerInterface
{
    public function __construct(
        private DraftAttributesClonerInterface $draftAttributesCloner,
        private DraftTaxonClonerInterface $draftTaxonCloner,
        private DraftImagesClonerInterface $draftImagesCloner,
        private DraftTranslationClonerInterface $draftTranslationCloner,
        private DraftPricingClonerInterface $draftPricingCloner,
        ) {
    }

    public function clone(
        DraftInterface $base,
        DraftInterface $destination
    ): void {
        $destination->setProductListing($base->getProductListing());
        $destination->setCode($base->getCode());
        $destination->setShippingRequired($base->isShippingRequired());
        $destination->setShippingCategory($base->getShippingCategory());
        $destination->setChannels($base->getChannels());
        $destination->setMainTaxon($base->getMainTaxon());

        $destination->clearProductDraftTaxons();
        $this->draftTaxonCloner->clone($base, $destination);

        $destination->clearAttributes();
        $this->draftAttributesCloner->clone($base, $destination);

        $destination->clearImages();
        $this->draftImagesCloner->clone($base, $destination);

        $this->draftTranslationCloner->clone($base, $destination);
        $this->draftPricingCloner->clone($base, $destination);
    }
}
