<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Sender;

use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;

interface SettlementsCreatedEmailSenderInterface
{
    public function send(VendorInterface $vendor, array $settlements): void;
}
