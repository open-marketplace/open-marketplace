<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\DataTransformer;

use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\VendorImageFileAwareInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\RequestStack;

final class VendorImageFileAwareCommandDataTransformer
{
    private RequestStack $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * @param VendorImageFileAwareInterface $object
     *
     * @return VendorImageFileAwareInterface
     */
    public function transform(
        $object,
        string $to,
        array $context = []
    ) {
        $files = $this->requestStack->getCurrentRequest()->files;

        if (null === $file = $files->get('file')) {
            return $object;
        }

        if ($file instanceof UploadedFile) {
            $object->setFile($file);
        }

        return $object;
    }

    public function supportsTransformation($object): bool
    {
        return $object instanceof VendorImageFileAwareInterface;
    }
}