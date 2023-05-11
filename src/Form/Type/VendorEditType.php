<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Valid;

final class VendorEditType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('companyName', TextType::class, [
                'label' => 'open_marketplace.ui.company_name',
            ])
            ->add('taxIdentifier', TextType::class, [
                'label' => 'open_marketplace.ui.tax_identifier',
            ])
            ->add('phoneNumber', TextType::class, [
                'label' => 'open_marketplace.ui.phone_number',
            ])
            ->add('vendorAddress', VendorAddressType::class, [
                'label' => 'open_marketplace.ui.vendor_address',
            ])
            ->add('vendorSettlement', VendorSettlementType::class, [
                'label' => 'open_marketplace.ui.vendor_settlement',
                'constraints' => [new Valid()],
            ]);
    }
}
