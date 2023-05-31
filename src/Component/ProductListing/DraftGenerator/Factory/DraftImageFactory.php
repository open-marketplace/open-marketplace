<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Factory;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftImage;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use Sylius\Component\Core\Model\ImageInterface;

final class DraftImageFactory implements DraftImageFactoryInterface
{
    public function createNew(): ImageInterface
    {
        return new DraftImage();
    }

    public function createForDraft(DraftInterface $productDraft): ImageInterface
    {
        $image = $this->createNew();
        $image->setOwner($productDraft);

        return $image;
    }

}
