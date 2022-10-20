<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Validator;

use BitBag\OpenMarketplace\Entity\ProductListing\ProductTranslationInterface;
use BitBag\OpenMarketplace\Validator\Constraint\UniqueProductListingSlugConstraint;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Core\Model\ProductInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Sylius\Component\Core\Model\ProductTranslationInterface as SyliusProductTranslationInterface;

final class UniqueProductListingSlugValidator extends ConstraintValidator
{
    private EntityRepository $productTranslationRepository;

    public function __construct(
        EntityRepository $productTranslationRepository
    ) {
        $this->productTranslationRepository = $productTranslationRepository;
    }

    /** @var ProductTranslationInterface */
    public function validate($value, Constraint $constraint): void
    {
        if (!$constraint instanceof UniqueProductListingSlugConstraint) {
            throw new UnexpectedTypeException($constraint, UniqueProductListingSlugConstraint::class);
        }

        $slug = trim($value->getSlug());
        if (0 === strlen($slug)) {
            throw new UnexpectedTypeException($constraint, UniqueProductListingSlugConstraint::class);
        }

        /** @var SyliusProductTranslationInterface|null $existingProductTranslation */
        $existingProductTranslation = $this->productTranslationRepository->findOneBy(['slug' => $value->getSlug()]);
        if (null === $existingProductTranslation) {
            return;
        }

        /** @var ProductInterface $existingProduct */
        $existingProduct = $existingProductTranslation->getTranslatable();
        $currentProduct = $value->getProductDraft()->getProductListing()->getProduct();

        if ($existingProduct->getId() !== $currentProduct->getId()) {
            $this->context->buildViolation($constraint->message)
                ->atPath('slug')
                ->setInvalidValue($value)
                ->setCode(UniqueEntity::NOT_UNIQUE_ERROR)
                ->addViolation();
        }
    }
}
