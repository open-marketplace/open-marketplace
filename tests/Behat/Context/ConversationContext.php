<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context;

use Behat\Behat\Context\Context;
use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\MinkContext;
use BitBag\OpenMarketplace\Component\Messaging\Entity\Category;
use BitBag\OpenMarketplace\Component\Vendor\Profile\Factory\AddressFactoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Profile\Factory\ProfileFactory;
use BitBag\OpenMarketplace\Component\Vendor\Profile\Factory\ProfileFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Component\Addressing\Model\Country;
use Sylius\Component\User\Repository\UserRepositoryInterface;

class ConversationContext extends MinkContext implements Context
{
    private EntityManagerInterface $manager;

    private ProfileFactory $vendorProfileFactory;

    private ExampleFactoryInterface $userFactory;

    private AddressFactoryInterface $addressFactory;

    private SharedStorageInterface $sharedStorage;

    private UserRepositoryInterface $userRepository;

    public function __construct(
        EntityManagerInterface $manager,
        ExampleFactoryInterface $userFactory,
        ProfileFactoryInterface $vendorProfileFactory,
        AddressFactoryInterface $addressFactory,
        SharedStorageInterface $sharedStorage,
        UserRepositoryInterface $userRepository
    ) {
        $this->manager = $manager;
        $this->vendorProfileFactory = $vendorProfileFactory;
        $this->userFactory = $userFactory;
        $this->addressFactory = $addressFactory;
        $this->sharedStorage = $sharedStorage;
        $this->userRepository = $userRepository;
    }

    /**
     * @Given there is a vendor user :vendor_user_email registered in country :country_code
     */
    public function thereIsAVendorUserRegisteredInCountry($vendor_user_email, $country_code): void
    {
        $user = $this->userFactory->create(['email' => $vendor_user_email, 'password' => 'password', 'enabled' => true]);
        $country = $this->manager->getRepository(Country::class)->findOneBy(['code' => $country_code]);
        $this->sharedStorage->set('user', $user);

        $this->userRepository->add($user);
        $address = $this->addressFactory->createAddress('Grand avenue', 'Berlin', '22-111', $country);

        $vendor = $this->vendorProfileFactory->createVendor(
            'someCompany',
            'TaxID',
            'iban',
            '333222111',
            'description',
            $address
        );

        $vendor->setSlug('vendor-slug');
        $vendor->setShopUser($user);
        $this->manager->persist($vendor);
        $this->manager->flush();
        $this->sharedStorage->set('vendor', $vendor);
    }

    /**
     * @When I press in menu :arg1
     */
    public function iPressInMenu($arg1)
    {
        $this->getPage()->pressButton("$arg1");
    }

    /**
     * @Then I select :arg1 variant
     */
    public function iSelectVariant($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given there is conversation category :categoryName
     */
    public function thereIsConversationCategory($categoryName)
    {
        $category = new Category();
        $category->setName($categoryName);
        $this->manager->persist($category);
        $this->manager->flush();
    }

    /**
     * @return DocumentElement
     */
    private function getPage()
    {
        return $this->getSession()->getPage();
    }
}
