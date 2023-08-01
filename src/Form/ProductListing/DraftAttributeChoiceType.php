<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Form\ProductListing;

use BitBag\OpenMarketplace\Component\Vendor\VendorContextInterface;
use BitBag\OpenMarketplace\Repository\DraftAttributeRepositoryInterface;
use Sylius\Bundle\AttributeBundle\Form\Type\AttributeChoiceType;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class DraftAttributeChoiceType extends AttributeChoiceType
{
    private VendorContextInterface $vendorProvider;

    public function __construct(RepositoryInterface $attributeRepository, VendorContextInterface $vendorProvider)
    {
        $this->attributeRepository = $attributeRepository;
        $this->vendorProvider = $vendorProvider;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        /** @var DraftAttributeRepositoryInterface $draftAttributeRepository */
        $draftAttributeRepository = $this->attributeRepository;
        $resolver
            ->setDefaults([
                'choices' => [$draftAttributeRepository->findVendorDraftAttributes($this->vendorProvider->getVendor())],
                'choice_value' => 'code',
                'choice_label' => 'name',
                'choice_translation_domain' => false,
                'required' => false,
            ]);
    }

    public function getBlockPrefix(): string
    {
        return 'sylius_product_attribute_choice';
    }
}
