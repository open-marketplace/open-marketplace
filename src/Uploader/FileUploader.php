<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Uploader;

use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class FileUploader implements FileUploaderInterface
{
    public function upload(UploadedFile $file, string $targetDirectory): string
    {
        try {
            $uuid = Uuid::uuid4();
            $filename = $uuid->toString() . '.' . $file->guessClientExtension();
            $file->move($targetDirectory, $filename);
        } catch (FileException $e) {
            throw new FileException();
        }

        return $filename;
    }
}
