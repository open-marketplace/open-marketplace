<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Common\Fixture\Factory;

use BitBag\OpenMarketplace\Component\Vendor\Contracts\VendorSettlementFrequency;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorShippingMethod;
use BitBag\OpenMarketplace\Component\Vendor\Profile\Factory\AddressFactoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Profile\Factory\BackgroundImageFactoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Profile\Factory\LogoImageFactoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Profile\Factory\ProfileFactoryInterface;
use Faker\Factory;
use Faker\Generator;
use Sylius\Bundle\CoreBundle\Fixture\Factory\AbstractExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\OptionsResolver\LazyOption;
use Sylius\Component\Addressing\Model\CountryInterface;
use Sylius\Component\Core\Formatter\StringInflector;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\CustomerInterface;
use Sylius\Component\Core\Model\ShippingMethodInterface;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Sylius\Component\Customer\Model\CustomerGroupInterface;
use Sylius\Component\Customer\Model\CustomerInterface as CustomerComponent;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\Config\FileLocatorInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class VendorExampleFactory extends AbstractExampleFactory
{
    private Generator $faker;

    private OptionsResolver $optionsResolver;

    public function __construct(
        private ProfileFactoryInterface $profileFactory,
        private AddressFactoryInterface $addressFactory,
        private FactoryInterface $shopUserFactory,
        private FactoryInterface $customerFactory,
        private RepositoryInterface $countryRepository,
        private RepositoryInterface $customerGroupRepository,
        private RepositoryInterface $vendorShippingMethodRepository,
        private RepositoryInterface $channelRepository,
        private LogoImageFactoryInterface $vendorImageFactory,
        private BackgroundImageFactoryInterface $backgroundImageFactory,
        private FileLocatorInterface $fileLocator,
        private ImageUploaderInterface $imageUploader,
        private FactoryInterface $countryFactory
    ) {
        $this->faker = Factory::create();
        $this->optionsResolver = new OptionsResolver();
        $this->configureOptions($this->optionsResolver);
    }

    public function create(array $options = []): VendorInterface
    {
        $this->countryCheck();

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

        $vendorAddress = $this->addressFactory->createAddress($options['street'], $options['city'], $options['postcode'], $options['country']);

        /** @var VendorInterface $vendor */
        $vendor = $this->profileFactory->createNew();
        $vendor->setCompanyName($options['company_name']);
        $vendor->setTaxIdentifier($options['tax_identifier']);
        $vendor->setBankAccountNumber($options['bank_account_number']);
        $vendor->setPhoneNumber($options['phone_number']);
        $vendor->setStatus($options['status']);
        $vendor->setEnabled($options['enabled']);
        $vendor->setSlug($options['slug']);
        $vendor->setDescription($options['description']);
        $vendor->setShopUser($user);
        $vendor->setVendorAddress($vendorAddress);
        $vendor->setSettlementFrequency($options['settlement_frequency']);

        if (null !== $options['image']) {
            /** @var string $imagePath */
            $imagePath = $this->fileLocator->locate($options['image']);
            $uploadedImage = new UploadedFile($imagePath, basename($imagePath));

            $vendorImage = $this->vendorImageFactory->create($imagePath, $vendor);
            $vendorImage->setFile($uploadedImage);
            $this->imageUploader->upload($vendorImage);
            $vendor->setImage($vendorImage);
            $vendorImage->setOwner($vendor);
        }

        if (null !== $options['backgroundImage']) {
            /** @var string $imagePath */
            $imagePath = $this->fileLocator->locate($options['backgroundImage']);
            $uploadedImage = new UploadedFile($imagePath, basename($imagePath));

            $vendorbackgroundImage = $this->backgroundImageFactory->create($imagePath, $vendor);
            $vendorbackgroundImage->setFile($uploadedImage);
            $this->imageUploader->upload($vendorbackgroundImage);
            $vendor->setBackgroundImage($vendorbackgroundImage);
            $vendorbackgroundImage->setOwner($vendor);
        }
        if (isset($options['shipping_methods'])) {
            $allChannels = $this->channelRepository->findAll();

            /** @var ChannelInterface $channel */
            foreach ($allChannels as $channel) {
                foreach ($options['shipping_methods'] as $shippingMethodCode) {
                    /** @var ShippingMethodInterface $shippingMethod */
                    $shippingMethod = $this->vendorShippingMethodRepository->findOneBy(['code' => $shippingMethodCode]);
                    $vendorShippingMethod = new VendorShippingMethod();
                    $vendorShippingMethod->setVendor($vendor);
                    $vendorShippingMethod->setShippingMethod($shippingMethod);
                    $vendorShippingMethod->setChannelCode($channel->getCode());

                    $vendor->addShippingMethod($vendorShippingMethod);
                }
            }
        }

        return $vendor;
    }

    protected function configureOptions(OptionsResolver $resolver): void
    {
        $resolver
            ->setDefault('email', fn (Options $options): string => $this->faker->email)
            ->setDefault('first_name', fn (Options $options): string => $this->faker->firstName)
            ->setDefault('last_name', fn (Options $options): string => $this->faker->lastName)
            ->setDefault('password', 'password')
            ->setDefault('image', null)
            ->setDefault('backgroundImage', null)
            ->setDefault('customer_group', LazyOption::randomOneOrNull($this->customerGroupRepository, 100))
            ->setDefault('shipping_methods', fn (Options $options): array => [])
            ->setAllowedTypes('customer_group', ['null', 'string', CustomerGroupInterface::class])
            ->setNormalizer('customer_group', LazyOption::findOneBy($this->customerGroupRepository, 'code'))
            ->setDefault('gender', CustomerComponent::UNKNOWN_GENDER)
            ->setAllowedValues(
                'gender',
                [CustomerComponent::UNKNOWN_GENDER, CustomerComponent::MALE_GENDER, CustomerComponent::FEMALE_GENDER],
            )
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
                },
            )
            ->setDefault('company_name', fn (Options $options): string => $this->faker->company)
            ->setDefault('tax_identifier', fn (Options $options): string => $this->faker->companySuffix)
            ->setDefault('bank_account_number', fn (Options $options): string => $this->faker->iban)
            ->setDefault('phone_number', fn (Options $options): string => $this->faker->phoneNumber)
            ->setDefault('status', VendorInterface::STATUS_VERIFIED)
            ->setDefault('enabled', true)
            ->setAllowedTypes('enabled', 'bool')
            ->setDefault('slug', fn (Options $options): string => StringInflector::nameToCode($options['company_name']))
            ->setDefault('description', fn (Options $options): string => $this->faker->sentence)
            ->setDefault('country', LazyOption::randomOne($this->countryRepository))
            ->setAllowedTypes('country', ['null', 'string', CountryInterface::class])
            ->setNormalizer('country', LazyOption::getOneBy($this->countryRepository, 'code'))
            ->setDefault('city', fn (Options $options): string => $this->faker->city)
            ->setDefault('street', fn (Options $options): string => $this->faker->streetAddress)
            ->setDefault('postcode', fn (Options $options): string => $this->faker->postcode)
            ->setDefault('settlement_frequency', VendorSettlementFrequency::DEFAULT_SETTLEMENT_FREQUENCY)
        ;
    }

    private function countryCheck(): void
    {
        if (0 === count($this->countryRepository->findAll())) {
            /** @var CountryInterface $country */
            $country = $this->countryFactory->createNew();
            $country->setCode($this->faker->countryCode);
            $country->setEnabled(true);
            $this->countryRepository->add($country);
        }
    }
}
