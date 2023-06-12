<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Messaging\Uploader;

use BitBag\OpenMarketplace\Uploader\FileUploaderInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class AttachmentUploader implements FileUploaderInterface
{
    private string $targetDirectory;

    public function __construct(
        string $targetDirectory
    ) {
        $this->targetDirectory = $targetDirectory;
    }

    public function upload(UploadedFile $file): string
    {
        while (true) {
            $filename = uniqid((string) rand(), true) . '.' . $file->guessExtension();
            if (!file_exists($this->getTargetDirectory() . $filename)) {
                break;
            }
        }

        try {
            $file->move($this->getTargetDirectory(), $filename);
        } catch (FileException $e) {
            throw new FileException();
        }

        return $filename;
    }

    public function getTargetDirectory(): string
    {
        return $this->targetDirectory;
    }
}
