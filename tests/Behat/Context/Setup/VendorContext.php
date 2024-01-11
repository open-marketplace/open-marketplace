<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use BitBag\OpenMarketplace\Component\Vendor\Contracts\VendorSettlementFrequency;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\Vendor;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ShopUserExampleFactory;
use Sylius\Component\Addressing\Model\Country;
use Sylius\Component\Addressing\Model\CountryInterface;
use Sylius\Component\Core\Formatter\StringInflector;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Webmozart\Assert\Assert;

final class VendorContext implements Context
{
    public function __construct(
        private ShopUserExampleFactory $shopUserExampleFactory,
        private ExampleFactoryInterface $vendorExampleFactory,
        private EntityManagerInterface $entityManager,
        private SharedStorageInterface $sharedStorage,
        private FactoryInterface $countryFactory,
        ) {
    }

    /**
     * @Given there is a :status vendor user :vendorUserEmail registered in country with code :countryCode
     * @Given there is a :status vendor user :vendorUserEmail registered in country with code :countryCode named :name
     */
    public function thereIsAVendorUserRegisteredInCountry(
        string $status,
        string $vendorUserEmail,
        string $countryCode,
        string $name = null
    ): void {
        /** @var ShopUserInterface $user */
        $user = $this->shopUserExampleFactory->create(['email' => $vendorUserEmail, 'password' => 'password', 'enabled' => true]);
        $user->setVerifiedAt(new \DateTime());
        $user->addRole('ROLE_USER');
        $user->addRole('ROLE_VENDOR');

        $this->sharedStorage->set('user', $user);

        $this->entityManager->persist($user);

        $country = $this->entityManager->getRepository(Country::class)->findOneBy(['code' => $countryCode]);
        if (null === $country) {
            /** @var CountryInterface $country */
            $country = $this->countryFactory->createNew();
            $country->setCode($countryCode);
            $country->enable();
            $this->entityManager->persist($country);
        }

        $options = [
            'company_name' => $name ?? 'Test',
            'phone_number' => '333333333',
            'tax_identifier' => '543455',
            'bank_account_number' => 'NL31INGB4405427607',
            'street' => 'Secret 13',
            'city' => 'Warsaw',
            'postcode' => '00-111',
            'slug' => 'vendor-slug',
            'description' => 'description',
            'country' => $country,
            'status' => $status,
        ];

        $vendor = $this->vendorExampleFactory->create($options);
        $vendor->setShopUser($user);
        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
        $this->sharedStorage->set('vendor', $vendor);
    }

    /**
     * @Given there is an vendor user :username with password :password
     */
    public function thereIsAnVendorUserWithPassword(string $username, string $password): void
    {
        /** @var ShopUserInterface $user */
        $user = $this->shopUserExampleFactory->create();
        $user->setUsername($username);
        $user->setPlainPassword($password);
        $user->setEmail($username . '@email.com');
        $this->entityManager->persist($user);

        $options = [
            'company_name' => 'vendor',
            'phone_number' => '987654321',
            'tax_identifier' => '123456789',
            'slug' => 'vendor-slug',
            'description' => 'description',
        ];

        /** @var Vendor $vendor */
        $vendor = $this->vendorExampleFactory->create($options);

        $vendor->setShopUser($user);
        $this->entityManager->persist($vendor);

        $this->entityManager->flush();

        $this->sharedStorage->set('vendor', $vendor);
    }

    /**
     * @Given vendor :vendorEmail has :frequency settlement frequency
     */
    public function vendorHasSettlementFrequency(string $vendorEmail, string $frequency): void
    {
        $frequency = StringInflector::nameToLowercaseCode($frequency);
        Assert::inArray($frequency, VendorSettlementFrequency::SETTLEMENT_FREQUENCIES);
        $vendor = $this->getVendorByEmail($vendorEmail);
        $vendor->setSettlementFrequency($frequency);
        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
    }

    /**
     * @Given vendor :vendorEmail was created on :dateTimeString
     */
    public function vendorWasCreatedOn(string $vendorEmail, string $dateTimeString): void
    {
        $vendor = $this->getVendorByEmail($vendorEmail);
        $vendor->setCreatedAt(new \DateTime($dateTimeString));

        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
    }

    private function getVendorByEmail(string $vendorEmail): VendorInterface
    {
        $shopUser = $this->entityManager->getRepository(ShopUserInterface::class)->findOneBy(['username' => $vendorEmail]);
        $vendor = $shopUser->getVendor();
        Assert::isInstanceOf($vendor, VendorInterface::class);

        return $vendor;
    }
}
