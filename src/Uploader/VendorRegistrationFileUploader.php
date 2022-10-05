<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Uploader;

use Gaufrette\Adapter\Local as LocalAdapter;
use Gaufrette\Filesystem;
use Gaufrette\FilesystemInterface;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class VendorRegistrationFileUploader implements FileUploaderInterface
{
    private FilesystemInterface $filesystem;

    public function __construct(string $publicDir)
    {
        $uploadLogoPath = $publicDir . $_ENV['LOGO_DIRECTORY'];
        $adapter = new LocalAdapter($uploadLogoPath, true);
        $this->filesystem = new Filesystem($adapter);
    }

    public function upload(UploadedFile $file): string
    {
        $uuid = Uuid::uuid4();
        $filename = $uuid->toString() . '.' . $file->guessExtension();
        $this->filesystem->write($filename, $file->getContent());

        return $filename;
    }
}
