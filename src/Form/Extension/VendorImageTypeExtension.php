<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Form\Extension;

use BitBag\SyliusMultiVendorMarketplacePlugin\Form\VendorImageType;
use BitBag\SyliusMultiVendorMarketplacePlugin\Form\VendorType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;

final class VendorImageTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('images', CollectionType::class, [
            'entry_type' => VendorImageType::class,
            'allow_add' => false,
            'allow_delete' => false,
            'by_reference' => false,
            'label' => 'bitbag_sylius_multi_vendor_marketplace_plugin.ui.logo'
        ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [VendorType::class];
    }
}
