<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\Cloner;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftImageInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Factory\DraftImageFactoryInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class DraftImagesCloner implements DraftImagesClonerInterface
{
    private DraftImageFactoryInterface $draftImageFactory;

    private string $imageUploadPath;

    public function __construct(
        DraftImageFactoryInterface $draftImageFactory,
        string $imageUploadPath,
    ) {
        $this->draftImageFactory = $draftImageFactory;
        $this->imageUploadPath = $imageUploadPath;
    }

    public function clone(
        DraftInterface $from,
        DraftInterface $to
    ): void {
        $baseImages = $from->getImages();

        /** @var DraftImageInterface $baseImage */
        foreach ($baseImages as $baseImage) {
            $newImage = $this->draftImageFactory->createForDraft($to);
            $newImage->setType($baseImage->getType());
            $newImage->setFile($baseImage->getFile());

            $baseImagePath = sprintf('%s/%s', $this->imageUploadPath, $baseImage->getPath());
            $newUploadedImage = new UploadedFile($baseImagePath, basename($baseImagePath));
            $newImage->setFile($newUploadedImage);

            $to->addImage($newImage);
        }
    }
}
