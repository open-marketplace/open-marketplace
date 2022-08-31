<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Form\ProductListing;

use Sylius\Bundle\CoreBundle\Form\Type\ChannelCollectionType;
use Sylius\Component\Core\Model\ChannelInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code', TextType::class, [
                'label' => 'sylius.ui.code',
                'disabled' => ($builder->getData()->getCode()),
                ])
            ->add('translations', ResourceTranslationsType::class, [
                'entry_type' => ProductTranslationType::class,
                'label' => 'sylius.form.product.translations',
                'attr' => [
                    'class' => 'ui styled fluid accordion',
                    ],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'bitbag_mvm_plugin.ui.save',
                'attr' => [
                    'class' => 'ui labeled icon primary button',
                ],
            ])
            ->add('saveAndAdd', SubmitType::class, [
                'label' => 'bitbag_mvm_plugin.ui.save_and_add',
                'attr' => [
                    'class' => 'ui labeled icon secondary button',
                ],
            ])
            ->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event): void {
                $product = $event->getData();
                $form = $event->getForm();
            })
            ->add('images', CollectionType::class, [
                'entry_type' => ProductDraftImageType::class,
                'entry_options' => ['product' => $options['data']],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => true,
                'required' => false,
                'label' => 'sylius.form.product.images',
                'block_name' => 'entry',
            ])
        ;

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event): void {
            $productDraft = $event->getData();

            $event->getForm()->add('productListingPrice', ChannelCollectionType::class, [
                'entry_type' => ProductPriceType::class,
                'entry_options' => fn (ChannelInterface $channel) => [
                    'channel' => $channel,
                    'product_draft' => $productDraft,
                    'required' => false,
                ],
                'label' => 'sylius.form.variant.price',
            ]);
        });
    }

    public function getBlockPrefix(): string
    {
        return 'sylius_product';
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'compound' => true,
        ]);
    }
}
