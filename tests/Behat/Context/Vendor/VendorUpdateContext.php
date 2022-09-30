<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context\Vendor;

use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddress;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddressUpdate;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdate;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorImageFactoryInterface;
use Doctrine\Persistence\ObjectManager;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Component\Addressing\Model\Country;
use Sylius\Component\User\Repository\UserRepositoryInterface;
use Webmozart\Assert\Assert;

class VendorUpdateContext extends RawMinkContext
{
    private SharedStorageInterface $sharedStorage;

    private UserRepositoryInterface $userRepository;

    private ExampleFactoryInterface $userFactory;

    private ObjectManager $manager;

    private VendorImageFactoryInterface $vendorImageFactory;

    public function __construct(
        SharedStorageInterface $sharedStorage,
        UserRepositoryInterface $userRepository,
        ExampleFactoryInterface $userFactory,
        ObjectManager $manager,
        VendorImageFactoryInterface $vendorImageFactory,
        ) {
        $this->sharedStorage = $sharedStorage;
        $this->userRepository = $userRepository;
        $this->userFactory = $userFactory;
        $this->manager = $manager;
        $this->vendorImageFactory = $vendorImageFactory;
    }

    /**
     * @Given there is a :status vendor user :vendor_user_email registered in country :country_code
     */
    public function thereIsAVendorUserRegisteredInCountry(
        $status,
        $vendor_user_email,
        $country_code
    ): void {
        $user = $this->userFactory->create(['email' => $vendor_user_email, 'password' => 'password', 'enabled' => true]);

        $this->sharedStorage->set('user', $user);

        $this->userRepository->add($user);

        $country = $this->manager->getRepository(Country::class)->findOneBy(['code' => $country_code]);
        $vendor = new Vendor();
        $vendor->setCompanyName('sdasdsa');
        $vendor->setShopUser($user);
        $vendor->setPhoneNumber('333333333');
        $vendor->setTaxIdentifier('543455');
        $vendor->setVendorAddress(new VendorAddress());
        $vendor->getVendorAddress()->setCountry($country);
        $vendor->getVendorAddress()->setCity('Warsaw');
        $vendor->getVendorAddress()->setPostalCode('00-111');
        $vendor->getVendorAddress()->setStreet('Tajna 13');
        $vendor->setSlug('vendor-slug');
        $vendor->setDescription('description');
        $vendor->setStatus($status);
        $this->manager->persist($vendor);
        $this->manager->flush();
        $this->sharedStorage->set('vendor', $vendor);
    }

    /**
     * @Then Pending update data should appear in database
     */
    public function pendingUpdateDataShouldAppearInDatabase()
    {
        $vendor = $this->sharedStorage->get('vendor');
        $pendingData = $this->manager->getRepository(VendorProfileUpdate::class)->findOneBy(['vendor' => $vendor]);

        Assert::notEq(null, $pendingData);
    }

    /**
     * @Given There is pending update data with token value :token for logged in vendor
     */
    public function thereIsPendingUpdateDataWithTokenValueForLoggedInVendor($token): void
    {
        $vendor = $this->sharedStorage->get('vendor');
        $country = $this->manager->getRepository(Country::class)->findOneBy(['code' => 'PL']);
        $pendigUpdate = new VendorProfileUpdate();
        $pendigUpdate->setVendorAddress(new VendorAddressUpdate());
        $pendigUpdate->setVendor($vendor);
        $pendigUpdate->setToken($token);
        $pendigUpdate->setCompanyName('new Company');
        $pendigUpdate->setTaxIdentifier('new ID');
        $pendigUpdate->setPhoneNumber('new number');
        $pendigUpdate->setDescription('new description');
        $pendigUpdate->getVendorAddress()->setStreet('new street');
        $pendigUpdate->getVendorAddress()->setCity('new city');
        $pendigUpdate->getVendorAddress()->setPostalCode('new code');
        $pendigUpdate->getVendorAddress()->setCountry($country);

        $this->manager->persist($pendigUpdate);
        $this->manager->flush();

        $this->sharedStorage->set('pendingUpdate', $pendigUpdate);
    }

    /**
     * @Then I should get validation error
     */
    public function iShouldGetValidationError()
    {
        $page = $this->getSession()->getPage();
        $label = $page->find('css', '.ui.red.pointing.label.sylius-validation-error');
        dd($label->getText());
    }

    /**
     * @Given vendor have logo attached to profile
     */
    public function vendorHaveLogoAttachedToProfile()
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
    public function iVisitConfirmationPage()
    {
        $repository = $this->manager->getRepository(VendorProfileUpdate::class);
        $updateData = $repository->findAll();
        $token = $updateData[0]->getToken();
        $session = $this->getSession();
        $session->visit('/en_US/account/vendor/profile-update/' . $token);
    }

    /**
     * @Then Logo should be updated
     */
    public function imageShouldBeUpdated()
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
        $companyName,
        $taxId,
        $phoneNumber
    ) {
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
        $companyName,
        $taxId,
        $phoneNumber
    ) {
        $page = $this->getSession()->getPage();
        $companyNameInput = $page->find('css', '#vendor_companyName');
        $taxIdInput = $page->find('css', '#vendor_taxIdentifier');
        $phoneNumberInput = $page->find('css', '#vendor_phoneNumber');

        Assert::eq($companyName, $companyNameInput->getAttribute('value'));
        Assert::eq($taxId, $taxIdInput->getAttribute('value'));
        Assert::eq($phoneNumber, $phoneNumberInput->getAttribute('value'));
    }
}
