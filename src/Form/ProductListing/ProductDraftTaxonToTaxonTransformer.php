<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Form\ProductListing;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftTaxonInterface;
use Sylius\Component\Core\Model\TaxonInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

final class ProductDraftTaxonToTaxonTransformer implements DataTransformerInterface
{
    private FactoryInterface $productDraftTaxonFactory;

    private RepositoryInterface $productDraftTaxonRepository;

    private DraftInterface $productDraft;

    public function __construct(
        FactoryInterface $productDraftTaxonFactory,
        RepositoryInterface $productDraftTaxonRepository,
        DraftInterface $productDraft,
        ) {
        $this->productDraftTaxonFactory = $productDraftTaxonFactory;
        $this->productDraftTaxonRepository = $productDraftTaxonRepository;
        $this->productDraft = $productDraft;
    }

    public function transform(mixed $value): ?TaxonInterface
    {
        if (null === $value) {
            return null;
        }

        $this->assertTransformationValueType($value, DraftTaxonInterface::class);

        return $value->getTaxon();
    }

    public function reverseTransform($value): ?DraftTaxonInterface
    {
        if (null === $value) {
            return null;
        }

        $this->assertTransformationValueType($value, TaxonInterface::class);

        /** @var DraftTaxonInterface|null $productDraftTaxon */
        $productDraftTaxon = $this->productDraftTaxonRepository->findOneBy(['taxon' => $value, 'productDraft' => $this->productDraft]);

        if (null === $productDraftTaxon) {
            /** @var DraftTaxonInterface $productDraftTaxon */
            $productDraftTaxon = $this->productDraftTaxonFactory->createNew();
            $productDraftTaxon->setProductDraft($this->productDraft);
            $productDraftTaxon->setTaxon($value);
        }

        return $productDraftTaxon;
    }

    /**
     * @throws TransformationFailedException
     */
    private function assertTransformationValueType(mixed $value, string $expectedType): void
    {
        if (!($value instanceof $expectedType)) {
            throw new TransformationFailedException(
                sprintf(
                    'Expected "%s", but got "%s"',
                    $expectedType,
                    get_debug_type($value),
                ),
            );
        }
    }
}
