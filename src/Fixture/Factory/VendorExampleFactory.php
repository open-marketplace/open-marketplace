<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Fixture\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use Faker\Generator;
use Sylius\Bundle\CoreBundle\Fixture\Factory\AbstractExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VendorExampleFactory extends AbstractExampleFactory implements ExampleFactoryInterface
{
    private Generator $faker;

    private OptionsResolver $optionsResolver;

    private FactoryInterface $vendorFactory;

    public function __construct(
        FactoryInterface $vendorFactory
    ) {
        $this->vendorFactory = $vendorFactory;
        $this->faker = \Faker\Factory::create();
        $this->optionsResolver = new OptionsResolver();

        $this->configureOptions($this->optionsResolver);
    }

    public function create(array $options = []): VendorInterface
    {
        $options = $this->optionsResolver->resolve($options);

        /** @var VendorInterface $vendor */
        $vendor = $this->vendorFactory->createNew();
        $vendor->setCompanyName($options['company_name']);
        $vendor->setPhoneNumber($options['phone_number']);
        $vendor->setTaxIdentifier($options['tax_identifier']);

        return $vendor;
    }

    protected function configureOptions(OptionsResolver $resolver): void
    {
        $resolver
            ->setDefault('company_name', fn (Options $options): string => $this->faker->company)
            ->setDefault('tax_identifier', fn (Options $options): string => $this->faker->phoneNumber)
            ->setDefault('phone_number', fn (Options $options): string => $this->faker->phoneNumber);
    }
}
