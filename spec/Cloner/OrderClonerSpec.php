<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\AddressCloner;
use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\OrderCloner;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;

final class OrderClonerSpec extends ObjectBehavior
{
    function let(EntityManagerInterface $entityManager, AddressCloner $addressCloner): void
    {
        $this->beConstructedWith($entityManager, $addressCloner);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(OrderCloner::class);
    }
}
