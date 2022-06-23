<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Form\Type;

use BitBag\SyliusMultiVendorMarketplacePlugin\Form\VendorAddressType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class VendorEditType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('companyName', TextType::class, [
                'label' => 'bitbag_mvm_plugin.ui.company_name',
            ])
            ->add('taxIdentifier', TextType::class, [
                'label' => 'bitbag_mvm_plugin.ui.tax_identifier',
            ])
            ->add('phoneNumber', TextType::class, [
                'label' => 'bitbag_mvm_plugin.ui.phone_number',
            ])
            ->add('vendorAddress', VendorAddressType::class, [
                'label' => 'bitbag_mvm_plugin.ui.vendor_address',
            ]);
    }
}
