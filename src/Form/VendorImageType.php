<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Form;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;

final class VendorImageType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('file', FileType::class, [
                'label' => 'bitbag_sylius_multi_vendor_marketplace_plugin.ui.logo',
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'bitbag_multi_vendor_marketplace_vendor_image';
    }
}
