<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Vendor\Form\Type\ProductListing;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use Sylius\Bundle\CoreBundle\Form\Type\ImageType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class DraftImageType extends ImageType
{
    public function buildView(
        FormView $view,
        FormInterface $form,
        array $options
    ): void {
        parent::buildView($view, $form, $options);

        $view->vars['product'] = $options['product'];
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);

        $resolver->setDefined('product');
        $resolver->setAllowedTypes('product', DraftInterface::class);
    }

    public function getBlockPrefix(): string
    {
        return 'sylius_product_image';
    }
}
