<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

namespace BitBag\OpenMarketplace\Provider;

use Sylius\Component\Taxonomy\Model\TaxonInterface;

interface TaxonProviderInterface
{
    public function provideForVendorPage(?string $slug, string $locale): ?TaxonInterface;
}
