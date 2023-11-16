<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Admin\Form\Type;

use BitBag\OpenMarketplace\Component\Core\Common\Form\Type\VendorAddressType;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class VendorType extends AbstractResourceType
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
            ->add('bankAccountNumber', TextType::class, [
                'label' => 'open_marketplace.ui.bank_account_number',
            ])
            ->add('phoneNumber', TextType::class, [
                'label' => 'open_marketplace.ui.phone_number',
            ])
            ->add('vendorAddress', VendorAddressType::class, [
                'label' => 'open_marketplace.ui.vendor_address',
            ])
            ->add('commission', NumberType::class, [
                'label' => 'open_marketplace.ui.commission',
            ])
            ->add('commissionType', ChoiceType::class, [
                'label' => 'open_marketplace.ui.commission_type',
                'choices' => [
                    'Net' => VendorInterface::NET_COMMISSION,
                    'Gross' => VendorInterface::GROSS_COMMISSION,
                ],
            ]);
    }
}
