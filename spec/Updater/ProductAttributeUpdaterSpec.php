<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Updater;

use BitBag\SyliusMultiVendorMarketplacePlugin\Updater\ProductAttributeUpdater;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;

final class ProductAttributeUpdaterSpec extends ObjectBehavior
{
    public function let(
        EntityManagerInterface $entityManager
    ): void {
        $this->beConstructedWith($entityManager);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(ProductAttributeUpdater::class);
    }
}
