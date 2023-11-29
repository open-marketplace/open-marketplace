<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Vendor;

use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate\Address;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate\ProfileUpdate;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Profile\Factory\LogoImageFactoryInterface;
use Doctrine\Persistence\ObjectManager;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Component\Addressing\Model\Country;
use Sylius\Component\Addressing\Model\CountryInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Taxonomy\Factory\TaxonFactory;
use Sylius\Component\User\Repository\UserRepositoryInterface;
use Webmozart\Assert\Assert;

final class VendorUpdateContext extends RawMinkContext
{
    public function __construct(
        private SharedStorageInterface $sharedStorage,
        private UserRepositoryInterface $userRepository,
        private ExampleFactoryInterface $userFactory,
        private ObjectManager $manager,
        private LogoImageFactoryInterface $vendorImageFactory,
        private TaxonFactory $taxonFactory,
        private ExampleFactoryInterface $vendorExampleFactory,
        private FactoryInterface $countryFactory,
        ) {
    }

    /**
     * @Given there is a :status vendor user :vendorUserEmail registered in country :countryCode
     */
    public function thereIsAVendorUserRegisteredInCountry(
        string $status,
        string $vendorUserEmail,
        string $countryCode
    ): void {
        /** @var ShopUserInterface $user */
        $user = $this->userFactory->create(['email' => $vendorUserEmail, 'password' => 'password', 'enabled' => true]);
        $user->setVerifiedAt(new \DateTime());
        $user->addRole('ROLE_USER');
        $user->addRole('ROLE_VENDOR');

        $this->sharedStorage->set('user', $user);

        $this->userRepository->add($user);

        $country = $this->manager->getRepository(Country::class)->findOneBy(['code' => $countryCode]);
        if (null === $country) {
            /** @var CountryInterface $country */
            $country = $this->countryFactory->createNew();
            $country->setCode($countryCode);
            $country->enable();
            $this->manager->persist($country);
        }

        $options = [
            'company_name' => 'Test',
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
        $this->manager->persist($vendor);
        $this->manager->flush();
        $this->sharedStorage->set('vendor', $vendor);
    }

    /**
     * @Then Pending update data should appear in database
     */
    public function pendingUpdateDataShouldAppearInDatabase(): void
    {
        $vendor = $this->sharedStorage->get('vendor');
        $pendingData = $this->manager->getRepository(ProfileUpdate::class)->findOneBy(['vendor' => $vendor]);

        Assert::notEq(null, $pendingData);
    }

    /**
     * @Given There is pending update data with token value :token for logged in vendor
     */
    public function thereIsPendingUpdateDataWithTokenValueForLoggedInVendor(string $token): void
    {
        $vendor = $this->sharedStorage->get('vendor');
        $country = $this->manager->getRepository(Country::class)->findOneBy(['code' => 'PL']);
        $pendingUpdate = new ProfileUpdate();
        $pendingUpdate->setVendorAddress(new Address());
        $pendingUpdate->setVendor($vendor);
        $pendingUpdate->setToken($token);
        $pendingUpdate->setCompanyName('new Company');
        $pendingUpdate->setTaxIdentifier('new ID');
        $pendingUpdate->setBankAccountNumber('new iban');
        $pendingUpdate->setPhoneNumber('new number');
        $pendingUpdate->setDescription('new description');
        $pendingUpdate->getVendorAddress()->setStreet('new street');
        $pendingUpdate->getVendorAddress()->setCity('new city');
        $pendingUpdate->getVendorAddress()->setPostalCode('new code');
        $pendingUpdate->getVendorAddress()->setCountry($country);

        $this->manager->persist($pendingUpdate);
        $this->manager->flush();

        $this->sharedStorage->set('pendingUpdate', $pendingUpdate);
    }

    /**
     * @Then I should get validation error
     */
    public function iShouldGetValidationError(): void
    {
        $page = $this->getSession()->getPage();
        $label = $page->find('css', '.ui.red.pointing.label.sylius-validation-error');
    }

    /**
     * @Given vendor have logo attached to profile
     */
    public function vendorHaveLogoAttachedToProfile(): void
    {
        /** @var VendorInterface $vendor */
        $vendor = $this->sharedStorage->get('vendor');
        $path = 'path/to/file.png';
        $image = $this->vendorImageFactory->create($path, $vendor);
        $vendor->setImage($image);
        $this->sharedStorage->set('path', $path);
    }

    /**
     * @When I visit confirmation page
     */
    public function iVisitConfirmationPage(): void
    {
        $repository = $this->manager->getRepository(ProfileUpdate::class);
        $updateData = $repository->findAll();
        $token = $updateData[0]->getToken();
        $session = $this->getSession();
        $session->visit('/en_US/account/vendor/profile-update/' . $token);
    }

    /**
     * @Then Logo should be updated
     */
    public function imageShouldBeUpdated(): void
    {
        $oldImagePath = $this->sharedStorage->get('path');
        $session = $this->getSession();
        $session->visit('/en_US/vendors/vendor-slug');

        $page = $session->getPage();
        $logo = $page->find('css', '#vendor_logo');
        $newPath = $logo->getAttribute('src');
        Assert::notEq($oldImagePath, $newPath);
    }

    /**
     * @Given Vendor company name is :companyName tax ID is :taxId phone number is :phoneNumber
     */
    public function vendorCompanyNameIsTaxIdIsPhoneNumberIs(
        string $companyName,
        string $taxId,
        string $phoneNumber
    ): void {
        /** @var VendorInterface $vendor */
        $vendor = $this->sharedStorage->get('vendor');
        $vendor->setCompanyName($companyName);
        $vendor->setTaxIdentifier($taxId);
        $vendor->setPhoneNumber($phoneNumber);

        $this->manager->persist($vendor);
        $this->manager->flush();
        $this->sharedStorage->set('vendor', $vendor);
    }

    /**
     * @Then I should see form initialized with :companyName :taxId :phoneNumber
     */
    public function iShouldSeeAsDefaultFormValues(
        string $companyName,
        string $taxId,
        string $phoneNumber
    ): void {
        $page = $this->getSession()->getPage();
        $companyNameInput = $page->find('css', '#profile_companyName');
        $taxIdInput = $page->find('css', '#profile_taxIdentifier');
        $phoneNumberInput = $page->find('css', '#profile_phoneNumber');

        Assert::eq($companyName, $companyNameInput->getAttribute('value'));
        Assert::eq($taxId, $taxIdInput->getAttribute('value'));
        Assert::eq($phoneNumber, $phoneNumberInput->getAttribute('value'));
    }

    /**
     * @Given the channel has a menu taxon
     */
    public function theChannelHasAsAMenuTaxon(): void
    {
        /** @var ChannelInterface $channel */
        $channel = $this->sharedStorage->get('channel');
        $taxon = $this->taxonFactory->createNew();
        $taxon->setCode('menu_category');
        $taxon->setName('main');
        $taxon->setSlug('main');
        $taxon->enable();
        $channel->setMenuTaxon($taxon);

        $this->manager->persist($taxon);
        $this->manager->flush();
    }
}
