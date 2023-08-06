<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Api\Messenger\Command\Vendor;

use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Sylius\Bundle\ApiBundle\Command\CommandAwareDataTransformerInterface;

interface VendorBackgroundImageOwnerAwareInterface extends CommandAwareDataTransformerInterface
{
    public function getOwner(): ?VendorInterface;

    public function setOwner(VendorInterface $owner): void;
}
