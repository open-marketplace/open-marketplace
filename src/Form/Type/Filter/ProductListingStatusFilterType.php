<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Form\Type\Filter;

use BitBag\SyliusMultiVendorMarketplacePlugin\ProductListingTerms\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

final class ProductListingStatusFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'status',
            ChoiceType::class,
            [
                'label' => false,
                'choices' => Options::getTypeFilter(),
                'required' => false
            ]
        );
    }
}
