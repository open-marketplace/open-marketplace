<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Common\Form\Type\Messaging;

use BitBag\OpenMarketplace\Component\Messaging\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'name',
            TextType::class,
            [
                'empty_data' => '',
            ]
        );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => Category::class, 'validation_groups' => ['sylius']]);
    }

    public function getBlockPrefix(): string
    {
        return 'mvm_category';
    }
}
