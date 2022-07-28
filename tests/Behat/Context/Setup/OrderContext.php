<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\OrderRepository;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\VendorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\CustomerGroupExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ShopUserExampleFactory;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Customer\Model\CustomerInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class OrderContext implements Context
{
    private SharedStorageInterface $sharedStorage;
    
    private FactoryInterface $orderFactory;
    
    private OrderRepository $orderRepository;
    
    private VendorRepository $vendorRepository;
    
    private ShopUserExampleFactory $userExampleFactory;
    
    private EntityManagerInterface $entityManager;

    public function __construct(
        SharedStorageInterface $sharedStorage,
        FactoryInterface $orderFactory,
        OrderRepository $orderRepository,
        VendorRepository $vendorRepository,
        ShopUserExampleFactory $userExampleFactory,
        EntityManagerInterface $entityManager,
    ) {
        $this->sharedStorage = $sharedStorage;
        $this->orderFactory = $orderFactory;
        $this->orderRepository = $orderRepository;
        $this->vendorRepository = $vendorRepository;
        $this->userExampleFactory = $userExampleFactory;
        $this->entityManager = $entityManager;
    }

    /**
     * @Given There is order with property :propertyName with value :value made with logged in seller
     */
    public function thereIsOrderWithPropertyWithValueMadeWithLoggedInSeller($propertyName, $value)
    {
        $vendor = $this->sharedStorage->get('vendor');

        $order = $this->createDefaultOrder();
        $order->setVendor($vendor);

        if(str_contains($propertyName, "CompletedAt") ){
            $date = new \DateTime($value);
            $order->{'set'.ucfirst($propertyName)}($date);
        } else {
            $order->{'set'.ucfirst($propertyName)}($value);
        }

        $this->sharedStorage->set('order', $order);

        $this->orderRepository->add($order);
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
    
    /**
     * @param string|null $localeCode
     *
     * @return OrderInterface
     */
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
        $channel = $this->sharedStorage->get("channel");
        $localeCode = $this->sharedStorage->get('locale')->getCode();
        return $this->createOrder(
            $customer,
            null,
            $channel,
            $localeCode
        );
    }
}
