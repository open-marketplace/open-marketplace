<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Fixture\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\CustomerInterface;
use Faker\Generator;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ShopUserExampleFactory as Factory;
use Sylius\Bundle\CoreBundle\Fixture\OptionsResolver\LazyOption;
use Sylius\Component\Core\Model\ShopUserInterface;
use Sylius\Component\Customer\Model\CustomerGroupInterface;
use Sylius\Component\Customer\Model\CustomerInterface as CustomerComponent;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ShopUserExampleFactory extends Factory implements ExampleFactoryInterface
{
    private Generator $faker;

    private OptionsResolver $optionsResolver;

    private FactoryInterface $shopUserFactory;

    private FactoryInterface $customerFactory;

    private RepositoryInterface $customerGroupRepository;

    public function __construct(
        FactoryInterface $shopUserFactory,
        FactoryInterface $customerFactory,
        RepositoryInterface $customerGroupRepository
    ) {
        $this->customerGroupRepository = $customerGroupRepository;
        $this->customerFactory = $customerFactory;
        $this->shopUserFactory = $shopUserFactory;
        $this->faker = \Faker\Factory::create();
        $this->optionsResolver = new OptionsResolver();

        $this->configureOptions($this->optionsResolver);
    }

    public function create(array $options = []): ShopUserInterface
    {
        $options = $this->optionsResolver->resolve($options);

        /** @var CustomerInterface $customer */
        $customer = $this->customerFactory->createNew();
        $customer->setEmail($options['email']);
        $customer->setFirstName($options['first_name']);
        $customer->setLastName($options['last_name']);
        $customer->setGroup($options['customer_group']);
        $customer->setGender($options['gender']);
        $customer->setPhoneNumber($options['phone_number']);
        $customer->setBirthday($options['birthday']);

        /** @var ShopUserInterface $user */
        $user = $this->shopUserFactory->createNew();
        $user->setPlainPassword($options['password']);
        $user->setEnabled($options['enabled']);
        $user->addRole('ROLE_USER');
        $user->setCustomer($customer);

        return $user;
    }

    protected function configureOptions(OptionsResolver $resolver): void
    {
        $resolver
            ->setDefault('company_name', fn (Options $options): string => $this->faker->company)
            ->setDefault('tax_identifier', fn (Options $options): string => $this->faker->phoneNumber)
            ->setDefault('email', fn (Options $options): string => $this->faker->email)
            ->setDefault('first_name', fn (Options $options): string => $this->faker->firstName)
            ->setDefault('last_name', fn (Options $options): string => $this->faker->lastName)
            ->setDefault('enabled', true)
            ->setAllowedTypes('enabled', 'bool')
            ->setDefault('password', 'password123')
            ->setDefault('customer_group', LazyOption::randomOneOrNull($this->customerGroupRepository, 100))
            ->setAllowedTypes('customer_group', ['null', 'string', CustomerGroupInterface::class])
            ->setNormalizer('customer_group', LazyOption::findOneBy($this->customerGroupRepository, 'code'))
            ->setDefault('gender', CustomerComponent::UNKNOWN_GENDER)
            ->setAllowedValues(
                'gender',
                [CustomerComponent::UNKNOWN_GENDER, CustomerComponent::MALE_GENDER, CustomerComponent::FEMALE_GENDER]
            )
            ->setDefault('phone_number', fn (Options $options): string => $this->faker->phoneNumber)
            ->setDefault('birthday', fn (Options $options): \DateTime => $this->faker->dateTimeThisCentury())
            ->setAllowedTypes('birthday', ['null', 'string', \DateTimeInterface::class])
            ->setNormalizer(
                'birthday',
                /** @param string|\DateTimeInterface|null $value */
                function (Options $options, string|\DateTimeInterface|null $value) {
                    if (is_string($value)) {
                        return \DateTime::createFromFormat('Y-m-d H:i:s', $value);
                    }

                    return $value;
                }
            )
        ;
    }
}
