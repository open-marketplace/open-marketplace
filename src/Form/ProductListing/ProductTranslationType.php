<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Form\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductTranslation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductTranslationType extends AbstractType
{
    protected string $dataClass = ProductTranslation::class;

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'sylius.form.product.name',
            ])
            ->add('slug', TextType::class, [
                'label' => 'sylius.form.product.slug',
            ])
            ->add('description', TextareaType::class, [
                'required' => false,
                'label' => 'sylius.form.product.description',
            ])
            ->add('metaKeywords', TextType::class, [
                'required' => false,
                'label' => 'sylius.form.product.meta_keywords',
            ])
            ->add('metaDescription', TextType::class, [
                'required' => false,
                'label' => 'sylius.form.product.meta_description',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => $this->dataClass,
        ]);
    }
}
