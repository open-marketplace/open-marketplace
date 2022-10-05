<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Form\ProductListing;

use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use Sylius\Bundle\ResourceBundle\Form\DataTransformer\RecursiveTransformer;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceAutocompleteChoiceType;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ProductDraftTaxonAutocompleteChoiceType extends AbstractType
{
    private FactoryInterface $productDraftTaxonFactory;

    private RepositoryInterface $productDraftTaxonRepository;

    public function __construct(FactoryInterface $productDraftTaxonFactory, RepositoryInterface $productDraftTaxonRepository)
    {
        $this->productDraftTaxonFactory = $productDraftTaxonFactory;
        $this->productDraftTaxonRepository = $productDraftTaxonRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        if ($options['multiple']) {
            $builder->addModelTransformer(
                new RecursiveTransformer(
                    new ProductDraftTaxonToTaxonTransformer(
                        $this->productDraftTaxonFactory,
                        $this->productDraftTaxonRepository,
                        $options['productDraft'],
                    ),
                ),
            );
        }

        if (!$options['multiple']) {
            $builder->addModelTransformer(
                new ProductDraftTaxonToTaxonTransformer(
                    $this->productDraftTaxonFactory,
                    $this->productDraftTaxonRepository,
                    $options['productDraft'],
                ),
            );
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'resource' => 'sylius.taxon',
            'choice_name' => 'name',
            'choice_value' => 'code',
        ]);

        $resolver
            ->setRequired('productDraft')
            ->setAllowedTypes('productDraft', ProductDraftInterface::class)
        ;
    }

    public function getParent(): string
    {
        return ResourceAutocompleteChoiceType::class;
    }

    public function getBlockPrefix(): string
    {
        return 'sylius_product_taxon_autocomplete_choice';
    }
}
