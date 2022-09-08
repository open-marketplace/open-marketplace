<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context\Vendor;

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\MinkContext;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddress;
use Doctrine\Persistence\ObjectManager;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Component\Addressing\Model\Country;
use Sylius\Component\User\Repository\UserRepositoryInterface;
use Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Page\vendor\CustomerDashboardPage;
use Webmozart\Assert\Assert;

class CustomerDashboardContext extends MinkContext implements Context
{
    private CustomerDashboardPage $dashboardPage;

    private UserRepositoryInterface $userRepository;

    private ExampleFactoryInterface $userFactory;

    private ObjectManager $manager;

    public function __construct(
        CustomerDashboardPage $dashboardPage,
        UserRepositoryInterface $userRepository,
        ExampleFactoryInterface $userFactory,
        ObjectManager $manager
    )
    {
        $this->dashboardPage = $dashboardPage;
        $this->userRepository = $userRepository;
        $this->userFactory = $userFactory;
        $this->manager = $manager;
    }

    /**
     * @Then I should see :arg1 inside sidebar
     */
    public function iShouldSeeInsideSidebar($arg1): void
    {
        Assert::true($this->dashboardPage->itemWithValueExistsInsideSidebar($arg1), "Cannot find $arg1 inside sidebar");
    }

    /**
     * @Then I should not see :arg1 inside sidebar
     */
    public function iShouldNotSeeInsideSidebar($arg1): void
    {
        Assert::true($this->dashboardPage->itemWithValueDoesntExistsInsideSidebar($arg1), "Found $arg1 inside sidebar");
    }

    /**
     * @Given there is a :status vendor user :vendor_user_email registered in country :country_code
     */
    public function thereIsAVendorUserRegisteredInCountry(
        $status,
        $vendor_user_email,
        $country_code
    ): void
    {
        $user = $this->userFactory->create(['email' => $vendor_user_email, 'password' => 'password', 'enabled' => true]);

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
    }
}
