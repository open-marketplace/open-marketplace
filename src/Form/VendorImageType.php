<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Form;

use Sylius\Bundle\CoreBundle\Form\Type\ImageType;

final class VendorImageType extends ImageType
{
    public function getBlockPrefix(): string
    {
        return 'bitbag_multi_vendor_marketplace_vendor_image';
    }
}
