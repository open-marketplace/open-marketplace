<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use Sylius\Component\Core\Model\AddressInterface;

interface AddressClonerInterface
{
    public function clone(AddressInterface $originalAddress, AddressInterface $newAddress): void;
}
