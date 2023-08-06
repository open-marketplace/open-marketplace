<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\Validator;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftTranslationInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Validator\Constraint\UniqueProductListingSlugConstraint;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

final class UniqueProductListingSlugValidator extends ConstraintValidator
{
    public const PRODUCT_LISTING_CREATE_PRODUCT_ROUTE = 'open_marketplace_vendor_product_listing_create_product';

    public function __construct(
        private RepositoryInterface $productTranslationRepository,
        private RequestStack $requestStack
    ) {
    }

    public function validate($value, Constraint $constraint): void
    {
        if (!$constraint instanceof UniqueProductListingSlugConstraint) {
            throw new UnexpectedTypeException($constraint, UniqueProductListingSlugConstraint::class);
        }

        $slug = trim($value->getSlug());
        if (0 === strlen($slug)) {
            throw new UnexpectedTypeException($constraint, UniqueProductListingSlugConstraint::class);
        }

        /** @var DraftTranslationInterface|null $existingProductTranslation */
        $existingProductTranslation = $this->productTranslationRepository->findOneBy(['slug' => $value->getSlug()]);
        if (null === $existingProductTranslation) {
            return;
        }

        if ($this->isCreateListingProductPage()) {
            $this->context->buildViolation($constraint->message)
                ->atPath('slug')
                ->setInvalidValue($value)
                ->setCode(UniqueEntity::NOT_UNIQUE_ERROR)
                ->addViolation()
            ;

            return;
        }
        $currentProduct = $value->getProductDraft()?->getProductListing();

        $existingProduct = $existingProductTranslation->getProductDraft()->getProductListing();

        if (null !== $currentProduct) {
            if ($currentProduct->getId() !== $existingProduct->getId()) {
                $this->context->buildViolation($constraint->message)
                    ->atPath('slug')
                    ->setInvalidValue($value)
                    ->setCode(UniqueEntity::NOT_UNIQUE_ERROR)
                    ->addViolation()
                ;
            }
        }
    }

    private function isCreateListingProductPage(): bool
    {
        /** @var Request $request */
        $request = $this->requestStack->getCurrentRequest();

        return self::PRODUCT_LISTING_CREATE_PRODUCT_ROUTE === $request->get('_route');
    }
}
