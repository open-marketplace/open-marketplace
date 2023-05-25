<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Setup;

use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Factory\ShipmentFactoryInterface;
use BitBag\OpenMarketplace\Repository\OrderRepository;
use Doctrine\ORM\EntityManagerInterface;
use SM\Factory\FactoryInterface as StateMachineFactoryInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\UserRepository;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ShopUserExampleFactory;
use Sylius\Component\Addressing\Model\Country;
use Sylius\Component\Addressing\Model\CountryInterface;
use Sylius\Component\Core\Factory\AddressFactoryInterface;
use Sylius\Component\Core\Model\Address;
use Sylius\Component\Core\Model\AddressInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\OrderShippingTransitions;
use Sylius\Component\Core\Repository\ShippingMethodRepositoryInterface;
use Sylius\Component\Customer\Model\CustomerInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Shipping\ShipmentTransitions;
use Webmozart\Assert\Assert;

final class OrderContext extends RawMinkContext
{
    private SharedStorageInterface $sharedStorage;

    private FactoryInterface $orderFactory;

    private OrderRepository $orderRepository;

    private ShopUserExampleFactory $userExampleFactory;

    private EntityManagerInterface $entityManager;

    private UserRepository $userRepository;

    private ShipmentFactoryInterface $shipmentFactory;

    private ShippingMethodRepositoryInterface $shippingMethodRepository;

    private StateMachineFactoryInterface $stateMachineFactory;

    private AddressFactoryInterface $addressFactory;

    private ExampleFactoryInterface $vendorExampleFactory;

    public function __construct(
        SharedStorageInterface $sharedStorage,
        FactoryInterface $orderFactory,
        OrderRepository $orderRepository,
        ShopUserExampleFactory $userExampleFactory,
        EntityManagerInterface $entityManager,
        UserRepository $userRepository,
        ShipmentFactoryInterface $shipmentFactory,
        ShippingMethodRepositoryInterface $shippingMethodRepository,
        StateMachineFactoryInterface $stateMachineFactory,
        AddressFactoryInterface $addressFactory,
        ExampleFactoryInterface $vendorExampleFactory,
        ) {
        $this->sharedStorage = $sharedStorage;
        $this->orderFactory = $orderFactory;
        $this->orderRepository = $orderRepository;
        $this->userExampleFactory = $userExampleFactory;
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
        $this->shipmentFactory = $shipmentFactory;
        $this->shippingMethodRepository = $shippingMethodRepository;
        $this->stateMachineFactory = $stateMachineFactory;
        $this->addressFactory = $addressFactory;
        $this->vendorExampleFactory = $vendorExampleFactory;
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

    /**
     * @Given /^(this order) has new shipment$/
     */
    public function thisOrderHasNewShipment(OrderInterface $order): void
    {
        $shippingMethod = $this->shippingMethodRepository->findOneBy([]);
        Assert::notEmpty($shippingMethod);

        $shipment = $this->shipmentFactory->createNew();
        $shipment->setMethod($shippingMethod);
        $shipment->setOrder($order);
        $order->addShipment($shipment);

        $this->stateMachineFactory->get($order, OrderShippingTransitions::GRAPH)->apply(OrderShippingTransitions::TRANSITION_REQUEST_SHIPPING);
        $this->applyShipmentTransitionOnOrder($order, ShipmentTransitions::TRANSITION_CREATE);

        $this->entityManager->flush();
    }

    /**
     * @Given /^(this order) has already been shipped$/
     */
    public function thisOrderHasAlreadyBeenShipped(OrderInterface $order): void
    {
        $this->stateMachineFactory->get($order, OrderShippingTransitions::GRAPH)->apply(OrderShippingTransitions::TRANSITION_SHIP);
        $this->applyShipmentTransitionOnOrder($order, ShipmentTransitions::TRANSITION_SHIP);

        $this->entityManager->flush();
    }

    /**
     * @Given this order has new shipping address city: :city, postalCode: :postalCode, street: :street
     */
    public function thisOrderHasNewShippingAddressCityPostalCodeStreet(
        string $city,
        string $postalCode,
        string $street
    ): void {
        $country = $this->entityManager->getRepository(Country::class)->findOneBy([]);
        Assert::notEmpty($country);

        /** @var OrderInterface $order */
        $order = $this->sharedStorage->get('order');
        $customer = $order->getCustomer();
        $order->setShippingAddress($this->createAddress($customer, $country, $city, $postalCode, $street));
        $this->entityManager->flush();
    }

    /**
     * @Given this order has new billing address city: :city, postalCode: :postalCode, street: :street
     */
    public function thisOrderHasNewBillingAddressCityPostalCodeStreet(
        string $city,
        string $postalCode,
        string $street
    ): void {
        $country = $this->entityManager->getRepository(Country::class)->findOneBy([]);
        Assert::notEmpty($country);

        /** @var OrderInterface $order */
        $order = $this->sharedStorage->get('order');
        $customer = $order->getCustomer();
        $order->setBillingAddress($this->createAddress($customer, $country, $city, $postalCode, $street));
        $this->entityManager->flush();
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
        $options = [
            'company_name' => 'Company Name',
            'phone_number' => '333333333',
            'tax_identifier' => '543455',
            'street' => 'Tajna 13',
            'city' => 'Warsaw',
            'postcode' => '00-111',
            'slug' => 'vendor-slug',
            'description' => 'description',
            'country' => $country,
        ];
        /** @var VendorInterface $vendor */
        $vendor = $this->vendorExampleFactory->create($options);

        $vendor->setShopUser($user);

        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
        $this->sharedStorage->set('vendor', $vendor);

        return $vendor;
    }

    private function applyShipmentTransitionOnOrder(OrderInterface $order, $transition): void
    {
        foreach ($order->getShipments() as $shipment) {
            $this->stateMachineFactory->get($shipment, ShipmentTransitions::GRAPH)->apply($transition);
        }
    }

    private function createAddress(
        CustomerInterface $customer,
        CountryInterface $country,
        string $city,
        string $postalCode,
        string $street
    ): AddressInterface {
        $address = $this->addressFactory->createNew();
        $address->setFirstName($customer->getFirstName());
        $address->setLastName($customer->getLastName());
        $address->setCountryCode($country->getCode());
        $address->setCity($city);
        $address->setPostcode($postalCode);
        $address->setStreet($street);

        return $address;
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
