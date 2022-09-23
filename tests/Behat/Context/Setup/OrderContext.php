<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context\Setup;

use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddress;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\OrderRepository;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\VendorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\UserRepository;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ShopUserExampleFactory;
use Sylius\Component\Addressing\Model\Country;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Customer\Model\CustomerInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class OrderContext extends RawMinkContext
{
    private SharedStorageInterface $sharedStorage;

    private FactoryInterface $orderFactory;

    private OrderRepository $orderRepository;

    private VendorRepository $vendorRepository;

    private ShopUserExampleFactory $userExampleFactory;

    private EntityManagerInterface $entityManager;

    private UserRepository $userRepository;

    public function __construct(
        SharedStorageInterface $sharedStorage,
        FactoryInterface $orderFactory,
        OrderRepository $orderRepository,
        VendorRepository $vendorRepository,
        ShopUserExampleFactory $userExampleFactory,
        EntityManagerInterface $entityManager,
        UserRepository $userRepository,
        ) {
        $this->sharedStorage = $sharedStorage;
        $this->orderFactory = $orderFactory;
        $this->orderRepository = $orderRepository;
        $this->vendorRepository = $vendorRepository;
        $this->userExampleFactory = $userExampleFactory;
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
    }

    /**
     * @Given There is order with property :propertyName with value :value made with logged in seller
     */
    public function thereIsOrderWithPropertyWithValueMadeWithLoggedInSeller($propertyName, $value): void
    {
        $vendor = $this->sharedStorage->get('vendor');

        $order = $this->createDefaultOrder();
        $order->setVendor($vendor);

        if (str_contains($propertyName, 'CompletedAt')) {
            $date = new \DateTime($value);
            $order->{'set' . ucfirst($propertyName)}($date);
        } else {
            $order->{'set' . ucfirst($propertyName)}($value);
        }

        $this->sharedStorage->set('order', $order);

        $this->orderRepository->add($order);
    }

    /**
     * @Given There is order with property :propertyName with value :value made with other seller
     */
    public function thereIsOrderWithPropertyWithValueMadeWithSomeSeller($propertyName, $value)
    {
        $vendor = $this->createDefaultVendor();

        $order = $this->createDefaultOrder();
        $order->setVendor($vendor);

        if (str_contains($propertyName, 'CompletedAt')) {
            $date = new \DateTime($value);
            $order->{'set' . ucfirst($propertyName)}($date);
        } else {
            $order->{'set' . ucfirst($propertyName)}($value);
        }

        $this->sharedStorage->set('order', $order);

        $this->orderRepository->add($order);
    }

    /**
     * @Given The order is made by customer with first name :firstName
     */
    public function theOrderIsMadeByCustomerWithFirstName(string $firstName): void
    {
        $order = $this->sharedStorage->get('order');
        $client = $order->getCustomer();
        $client->setFirstName($firstName);
        $this->entityManager->persist($client);
        $this->entityManager->flush();
        $this->sharedStorage->set('order', $order);
    }

    /**
     * @Given I am on order details page
     */
    public function iAmOnOrderDetailsPage()
    {
        $order = $this->sharedStorage->get('order');
        $this->visitPath('/en_US/account/vendor/orders/' . $order->getId());
    }

    /**
     * @Given There is :count orders made with logged in seller
     */
    public function thereIsOrdersMadeWithLoggedInSeller($count)
    {
        $vendor = $this->sharedStorage->get('vendor');
        $orders = [];

        for ($i = 0; $i < $count; ++$i) {
            $orders[$i] = $this->createDefaultOrder();
            $orders[$i]->setVendor($vendor);

            $this->orderRepository->add($orders[$i]);
        }
        $this->sharedStorage->set('orders', $orders);
    }

    private function createOrder(
        CustomerInterface $customer,
        ?string $number = null,
        ?ChannelInterface $channel = null,
        ?string $localeCode = null
    ) {
        $order = $this->createCart($customer, $channel, $localeCode);

        if (null !== $number) {
            $order->setNumber($number);
        }

        $order->completeCheckout();

        return $order;
    }

    private function createCart(
        CustomerInterface $customer,
        ChannelInterface $channel = null,
        string $localeCode = null
    ): OrderInterface {
        /** @var OrderInterface $order */
        $order = $this->orderFactory->createNew();

        $order->setCustomer($customer);
        $order->setChannel($channel ?? $this->sharedStorage->get('channel'));
        $order->setLocaleCode($localeCode ?? $this->sharedStorage->get('locale')->getCode());
        $order->setCurrencyCode($order->getChannel()->getBaseCurrency()->getCode());

        return $order;
    }

    private function createDefaultOrder(): OrderInterface
    {
        $user = $this->userExampleFactory->create();
        $customer = $user->getCustomer();
        $channel = $this->sharedStorage->get('channel');
        $localeCode = $this->sharedStorage->get('locale')->getCode();

        return $this->createOrder(
            $customer,
            $number = null,
            $channel,
            $localeCode
        );
    }

    private function createDefaultVendor(): VendorInterface
    {
        $user = $this->userExampleFactory->create(['email' => 'test@x.x', 'password' => 'password', 'enabled' => true]);

        $this->sharedStorage->set('user', $user);

        $this->userRepository->add($user);

        $country = $this->entityManager->getRepository(Country::class)->findAll()[0];
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
        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
        $this->sharedStorage->set('vendor', $vendor);

        return $vendor;
    }

    /**
     * @Given I am on customer details page
     */
    public function iAmOnCustomerDetailsPage()
    {
        $order = $this->sharedStorage->get('order');
        $this->visitPath('/en_US/account/vendor/customers/' . $order->getCustomer()->getId());
    }
}
