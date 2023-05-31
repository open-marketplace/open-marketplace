<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Vendor;

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\MinkContext;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Entity\Vendor;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Doctrine\Persistence\ObjectManager;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Component\Addressing\Model\Country;
use Sylius\Component\User\Repository\UserRepositoryInterface;
use Tests\BitBag\OpenMarketplace\Behat\Page\vendor\CustomerDashboardPage;
use Webmozart\Assert\Assert;

class CustomerDashboardContext extends MinkContext implements Context
{
    private CustomerDashboardPage $dashboardPage;

    private UserRepositoryInterface $userRepository;

    private ExampleFactoryInterface $userFactory;

    private ObjectManager $manager;

    private ExampleFactoryInterface $vendorExampleFactory;

    public function __construct(
        CustomerDashboardPage $dashboardPage,
        UserRepositoryInterface $userRepository,
        ExampleFactoryInterface $userFactory,
        ObjectManager $manager,
        ExampleFactoryInterface $vendorExampleFactory,
        ) {
        $this->dashboardPage = $dashboardPage;
        $this->userRepository = $userRepository;
        $this->userFactory = $userFactory;
        $this->manager = $manager;
        $this->vendorExampleFactory = $vendorExampleFactory;
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
    ): void {
        /** @var ShopUserInterface $user */
        $user = $this->userFactory->create(['email' => $vendor_user_email, 'password' => 'password', 'enabled' => true]);
        $user->setVerifiedAt(new \DateTime());
        $user->addRole('ROLE_USER');
        $user->addRole('ROLE_VENDOR');

        $this->userRepository->add($user);

        $country = $this->manager->getRepository(Country::class)->findOneBy(['code' => $country_code]);

        $options = [
            'company_name' => 'Test',
            'phone_number' => '333333333',
            'tax_identifier' => '543455',
            'street' => 'Secret 13',
            'city' => 'Warsaw',
            'postcode' => '00-111',
            'slug' => 'vendor-slug',
            'description' => 'description',
            'country' => $country,
            'status' => $status,
        ];

        /** @var VendorInterface $vendor */
        $vendor = $this->vendorExampleFactory->create($options);
        $vendor->setShopUser($user);
        $user->setVendor($vendor);
        $this->manager->persist($vendor);
        $this->manager->flush();
    }
}
