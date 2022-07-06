<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use Doctrine\ORM\EntityManagerInterface;

use Sylius\Component\Core\Model\Address;
use Sylius\Component\Core\Model\AddressInterface;
use Sylius\Component\Core\Model\OrderInterface;

final class OrderCloner implements OrderClonerInterface
{
    private EntityManagerInterface $entityManager;

    private AddressCloner $addressCloner;

    public function __construct(EntityManagerInterface $entityManager, AddressCloner $addressCloner)
    {
        $this->entityManager = $entityManager;
        $this->addressCloner = $addressCloner;
    }

    public function clone(OrderInterface $originalOrder, OrderInterface $newOrder): void
    {
        $newBillingAddress = new Address();
        $newShippingAddress = new Address();

        /** @var AddressInterface $originalBillingAddress */
        $originalBillingAddress = $originalOrder->getBillingAddress();
        /** @var AddressInterface $originalShippingAddress */
        $originalShippingAddress = $originalOrder->getBillingAddress();

        $this->addressCloner->clone($originalBillingAddress, $newBillingAddress);
        $this->addressCloner->clone($originalShippingAddress, $newShippingAddress);

        $this->entityManager->persist($newShippingAddress);
        $this->entityManager->persist($newBillingAddress);

        $newOrder->setCustomer($newOrder->getCustomer());
        $newOrder->setBillingAddress($newBillingAddress);
        $newOrder->setShippingAddress($newShippingAddress);
        $newOrder->setLocaleCode($originalOrder->getLocaleCode());
        $newOrder->setChannel($originalOrder->getChannel());
        $newOrder->setCheckoutCompletedAt($originalOrder->getCheckoutCompletedAt());
        $newOrder->setCurrencyCode($originalOrder->getCurrencyCode());
        $newOrder->setCustomerIp($originalOrder->getCustomerIp());
        $newOrder->setCreatedByGuest($originalOrder->getCreatedByGuest());
        $newOrder->setNotes($originalOrder->getNotes());
        $newOrder->setCreatedAt($originalOrder->getCreatedAt());
        $newOrder->setState($originalOrder->getState());
        $newOrder->setCheckoutState($originalOrder->getCheckoutState());
        $newOrder->setPaymentState($originalOrder->getPaymentState());
        $newOrder->setShippingState($originalOrder->getShippingState());
        $newOrder->setCustomer($originalOrder->getCustomer());

        $this->entityManager->flush();
    }
}
