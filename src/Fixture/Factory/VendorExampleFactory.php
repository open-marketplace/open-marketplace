<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Fixture\Factory;

use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Entity\VendorShippingMethod;
use BitBag\OpenMarketplace\Factory\AddressFactoryInterface;
use BitBag\OpenMarketplace\Factory\VendorBackgroundImageFactoryInterface;
use BitBag\OpenMarketplace\Factory\VendorImageFactoryInterface;
use BitBag\OpenMarketplace\Factory\VendorProfileFactoryInterface;
use Faker\Factory;
use Faker\Generator;
use Sylius\Bundle\CoreBundle\Fixture\Factory\AbstractExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
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

final class VendorExampleFactory extends AbstractExampleFactory implements ExampleFactoryInterface
{
    private Generator $faker;

    private OptionsResolver $optionsResolver;

    private VendorProfileFactoryInterface $profileFactory;

    private AddressFactoryInterface $addressFactory;

    private FactoryInterface $shopUserFactory;

    private FactoryInterface $customerFactory;

    private RepositoryInterface $countryRepository;

    private RepositoryInterface $customerGroupRepository;

    private RepositoryInterface $vendorShippingMethodRepository;

    private RepositoryInterface $channelRepository;

    private VendorImageFactoryInterface $vendorImageFactory;

    private VendorBackgroundImageFactoryInterface $backgroundImageFactory;

    private FileLocatorInterface $fileLocator;

    private ImageUploaderInterface $imageUploader;

    public function __construct(
        VendorProfileFactoryInterface $profileFactory,
        AddressFactoryInterface $addressFactory,
        FactoryInterface $shopUserFactory,
        FactoryInterface $customerFactory,
        RepositoryInterface $countryRepository,
        RepositoryInterface $customerGroupRepository,
        RepositoryInterface $vendorShippingMethodRepository,
        RepositoryInterface $channelRepository,
        VendorImageFactoryInterface $vendorImageFactory,
        VendorBackgroundImageFactoryInterface $backgroundImageFactory,
        FileLocatorInterface $fileLocator,
        ImageUploaderInterface $imageUploader
    ) {
        $this->profileFactory = $profileFactory;
        $this->addressFactory = $addressFactory;
        $this->shopUserFactory = $shopUserFactory;
        $this->customerFactory = $customerFactory;
        $this->countryRepository = $countryRepository;
        $this->customerGroupRepository = $customerGroupRepository;
        $this->vendorShippingMethodRepository = $vendorShippingMethodRepository;
        $this->channelRepository = $channelRepository;
        $this->faker = Factory::create();
        $this->optionsResolver = new OptionsResolver();
        $this->configureOptions($this->optionsResolver);
        $this->vendorImageFactory = $vendorImageFactory;
        $this->backgroundImageFactory = $backgroundImageFactory;
        $this->fileLocator = $fileLocator;
        $this->imageUploader = $imageUploader;
    }

    public function create(array $options = []): VendorInterface
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

        $vendorAddress = $this->addressFactory->createAddress($options['street'], $options['city'], $options['postcode'], $options['country']);

        /** @var VendorInterface $vendor */
        $vendor = $this->profileFactory->createNew();
        $vendor->setCompanyName($options['company_name']);
        $vendor->setTaxIdentifier($options['tax_identifier']);
        $vendor->setPhoneNumber($options['phone_number']);
        $vendor->setStatus($options['status']);
        $vendor->setEnabled($options['enabled']);
        $vendor->setSlug($options['slug']);
        $vendor->setDescription($options['description']);
        $vendor->setShopUser($user);
        $vendor->setVendorAddress($vendorAddress);

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
        ;
    }
}
