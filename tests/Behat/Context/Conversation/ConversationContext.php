<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Conversation;

use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\MinkContext;
use BitBag\OpenMarketplace\Component\Messaging\Entity\Category;
use BitBag\OpenMarketplace\Component\Vendor\Profile\Factory\AddressFactoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Profile\Factory\ProfileFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Component\Addressing\Model\Country;
use Sylius\Component\User\Repository\UserRepositoryInterface;

final class ConversationContext extends MinkContext
{
    public function __construct(
        private EntityManagerInterface $manager,
        private ExampleFactoryInterface $userFactory,
        private ProfileFactoryInterface $vendorProfileFactory,
        private AddressFactoryInterface $addressFactory,
        private SharedStorageInterface $sharedStorage,
        private UserRepositoryInterface $userRepository
    ) {
    }

    /**
     * @Given there is a vendor user :vendorUserEmail registered in country :countryCode
     */
    public function thereIsAVendorUserRegisteredInCountry(string $vendorUserEmail, string $countryCode): void
    {
        $user = $this->userFactory->create(['email' => $vendorUserEmail, 'password' => 'password', 'enabled' => true]);
        $country = $this->manager->getRepository(Country::class)->findOneBy(['code' => $countryCode]);
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
     * @When I press in menu :item
     */
    public function iPressInMenu(string $item): void
    {
        $this->getPage()->pressButton($item);
    }

    /**
     * @Given there is conversation category :categoryName
     */
    public function thereIsConversationCategory(string $categoryName): void
    {
        $category = new Category();
        $category->setName($categoryName);
        $this->manager->persist($category);
        $this->manager->flush();
    }

    private function getPage(): DocumentElement
    {
        return $this->getSession()->getPage();
    }
}
