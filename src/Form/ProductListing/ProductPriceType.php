<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Form\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingPrice;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingPriceInterface;
use Sylius\Bundle\MoneyBundle\Form\Type\MoneyType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\ChannelPricingInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ProductPriceType extends AbstractResourceType
{
    private RepositoryInterface $channelPricingRepository;

    protected $dataClass = ProductListingPrice::class;

    public function __construct(
        array $validationGroups,
        RepositoryInterface $channelPricingRepository
    ) {
        $this->channelPricingRepository = $channelPricingRepository;
        parent::__construct($this->dataClass, $validationGroups);
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('price', MoneyType::class, [
                'label' => 'sylius.ui.price',
                'currency' => $options['channel']->getBaseCurrency()->getCode(),
            ])
            ->add('originalPrice', MoneyType::class, [
                'label' => 'sylius.ui.original_price',
                'required' => false,
                'currency' => $options['channel']->getBaseCurrency()->getCode(),
            ])
            ->add('minimumPrice', MoneyType::class, [
                'label' => 'sylius.ui.minimum_price',
                'required' => false,
                'currency' => $options['channel']->getBaseCurrency()->getCode(),
            ])
        ;

        $builder->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) use ($options): void {

            $pricing = $event->getData();

            if (!$pricing instanceof $this->dataClass || !$pricing instanceof ProductListingPriceInterface) {
                $event->setData(null);

                return;
            }

            if (($pricing->getPrice() === null) && ($pricing->getOriginalPrice() === null)) {
                $event->setData(null);

                if ($pricing->getId() !== null) {
                    $this->channelPricingRepository->remove($pricing);
                }

                return;
            }

            $pricing->setChannelCode($options['channel']->getCode());
            $pricing->setProductDraft($options['product_draft']);

            $event->setData($pricing);
        });
    }

    public function getBlockPrefix(): string
    {
        return 'bitbag_product_product';
    }



    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);

        $resolver
            ->setRequired('channel')
            ->setAllowedTypes('channel', [ChannelInterface::class])
            ->setDefined('product_draft')
            ->setAllowedTypes('product_draft', ['null', ProductDraftInterface::class])

            ->setDefaults([
                'label' => fn(Options $options): string => $options['channel']->getName(),
            ])
        ;
    }
}
