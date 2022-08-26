<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Form\Type;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorShippingMethodInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Repository\ShippingMethodRepositoryInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class VendorShippingMethodChoiceType extends AbstractType
{
    private ShippingMethodRepositoryInterface $shippingMethodRepository;

    private FactoryInterface $vendorShippingMethodFactory;

    public function __construct(ShippingMethodRepositoryInterface $shippingMethodRepository, FactoryInterface $vendorShippingMethodFactory)
    {
        $this->shippingMethodRepository = $shippingMethodRepository;
        $this->vendorShippingMethodFactory = $vendorShippingMethodFactory;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) use ($options): void {
                $shippingMethods = $event->getData();

                $vendorShippingMethods = [];

                foreach ($shippingMethods as $shippingMethod) {
                    /** @var VendorShippingMethodInterface $vendorShippingMethod */
                    $vendorShippingMethod = $this->vendorShippingMethodFactory->createNew();
                    $vendorShippingMethod->setVendor($options['vendor']);
                    $vendorShippingMethod->setShippingMethod($shippingMethod);
                    $vendorShippingMethod->setChannelCode($options['channel']->getCode());
                    $vendorShippingMethods[] = $vendorShippingMethod;
                }

                $event->setData($vendorShippingMethods);
            });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver
            ->setDefaults([
                'choices' => fn (Options $options) => $this->shippingMethodRepository->findEnabledForChannel($options['channel']),
                'choice_value' => 'code',
                'choice_label' => 'name',
                'choice_translation_domain' => false,
            ])
            ->setRequired('channel')
            ->setAllowedTypes('channel', [ChannelInterface::class])

            ->setRequired('vendor')
            ->setAllowedTypes('vendor', [VendorInterface::class])
        ;
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }

    public function getBlockPrefix(): string
    {
        return 'bitbag_mvm_plugin_shipping_method_choice';
    }
}
