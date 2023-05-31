<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\DataTransformer;

use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\ProductDraftAwareInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Factory\DraftImageFactoryInterface;
use Sylius\Bundle\ApiBundle\DataTransformer\CommandDataTransformerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

final class ProductDraftAwareCommandDataTransformer implements CommandDataTransformerInterface
{
    private RequestStack $requestStack;

    private DraftImageFactoryInterface $draftImageFactory;

    public function __construct(
        RequestStack $requestStack,
        DraftImageFactoryInterface $draftImageFactory
    ) {
        $this->requestStack = $requestStack;
        $this->draftImageFactory = $draftImageFactory;
    }

    /**
     * @param ProductDraftAwareInterface $object
     *
     * @return ProductDraftAwareInterface
     */
    public function transform(
        $object,
        string $to,
        array $context = []
    ) {
        if (null === $productDraft = $object->getProductDraft()) {
            return $object;
        }

        /** @var Request $request */
        $request = $this->requestStack->getCurrentRequest();

        $files = $request->files;

        if (null === $imageFiles = $files->get('images')) {
            return $object;
        }

        if (!is_array($imageFiles)) {
            return $object;
        }

        $productDraft->getImages()->clear();

        foreach ($imageFiles as $imageFile) {
            if ($imageFile instanceof UploadedFile) {
                $draftImage = $this->draftImageFactory->createNew();
                $draftImage->setFile($imageFile);
                $productDraft->addImage($draftImage);
            }
        }

        return $object;
    }

    /** @param object $object */
    public function supportsTransformation($object): bool
    {
        return $object instanceof ProductDraftAwareInterface;
    }
}
