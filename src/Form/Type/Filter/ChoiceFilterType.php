<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Form\Type\Filter;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class ChoiceFilterType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver
            ->setDefault('placeholder', 'sylius.ui.all')
            ->setAllowedTypes('choices', ['array'])
        ;
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }
//    public function setDefaultOptions(OptionsResolver $resolver)
//    {
//        $resolver
//            ->setDefaults(array(
//                'range' => array(0, 10)
//            ))
//            ->setAllowedTypes('range', array('array'))
//        ;
//    }

//    public function getType()
//    {
//        return 'sylius_filter_tournament_statistics'; // The name is important to be sylius_filter_NAME
//    }
    public function getBlockPrefix(): string
    {
        return 'sylius_grid_filter_tournament_statistics';
    }
}
