<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Validator;

use BitBag\OpenMarketplace\Api\Context\VendorContextInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Repository\ProductListing\ProductListingRepositoryInterface;
use BitBag\OpenMarketplace\Validator\Constraint\ProductListingCodeConstraint;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

final class ProductListingCodeValidator extends ConstraintValidator
{
    private ProductListingRepositoryInterface $productListingRepository;

    private VendorContextInterface $vendorContext;

    public function __construct(ProductListingRepositoryInterface $productListingRepository, VendorContextInterface $vendorContext)
    {
        $this->productListingRepository = $productListingRepository;
        $this->vendorContext = $vendorContext;
    }

    /**
     * @param ProductDraftInterface $value
     */
    public function validate($value, Constraint $constraint): void
    {
        if (!$constraint instanceof ProductListingCodeConstraint) {
            throw new UnexpectedTypeException($constraint, ProductListingCodeConstraint::class);
        }

        $code = $value->getCode();
        /** @var VendorInterface $vendor */
        $vendor = $this->vendorContext->getVendor();
        $productListing = $this->productListingRepository->findByCodeAndVendor($code, $vendor);
        if (null !== $productListing) {
            $this->context->addViolation($constraint->message);
        }
    }
}
