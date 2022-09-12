<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Form\ProductListing;

use Sylius\Bundle\AttributeBundle\Form\Type\AttributeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;

final class DraftAttributeType extends AttributeType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('position', IntegerType::class, [
                'required' => false,
                'label' => 'sylius.form.product_attribute.position',
                'invalid_message' => 'sylius.product_attribute.invalid',
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'sylius_product_attribute';
    }
}
