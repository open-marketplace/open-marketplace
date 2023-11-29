<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Vendor;

use Behat\MinkExtension\Context\MinkContext;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\Persistence\ObjectManager;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Component\Addressing\Model\Country;
use Sylius\Component\User\Repository\UserRepositoryInterface;
use Tests\BitBag\OpenMarketplace\Behat\Page\vendor\CustomerDashboardPage;
use Webmozart\Assert\Assert;

final class CustomerDashboardContext extends MinkContext
{
    public function __construct(
        private CustomerDashboardPage $dashboardPage,
        private UserRepositoryInterface $userRepository,
        private ExampleFactoryInterface $userFactory,
        private ObjectManager $manager,
        private ExampleFactoryInterface $vendorExampleFactory,
        ) {
    }

    /**
     * @Then /^I should (see|not see) "([^"]*)" inside sidebar$/
     */
    public function iShouldSeeInsideSidebar(string $see, string $value): void
    {
        $exist = 'see' === $see;
        Assert::same(
            $this->dashboardPage->itemWithValueExistsInsideSidebar($value),
            $exist,
            sprintf(
                '%s %s inside sidebar',
                $exist ? 'Cannot find' : 'Found',
                $value
            )
        );
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

        $this->userRepository->add($user);

        $country = $this->manager->getRepository(Country::class)->findOneBy(['code' => $countryCode]);

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

        /** @var VendorInterface $vendor */
        $vendor = $this->vendorExampleFactory->create($options);
        $vendor->setShopUser($user);
        $user->setVendor($vendor);
        $this->manager->persist($vendor);
        $this->manager->flush();
    }
}
