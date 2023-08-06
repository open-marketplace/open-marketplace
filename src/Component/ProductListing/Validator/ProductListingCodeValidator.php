<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\Validator;

use BitBag\OpenMarketplace\Component\Core\Api\Context\VendorContextInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Repository\ListingRepositoryInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Validator\Constraint\ProductListingCodeConstraint;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

final class ProductListingCodeValidator extends ConstraintValidator
{
    public const PRODUCT_LISTING_CREATE_PRODUCT_ROUTE = 'open_marketplace_vendor_product_listing_create_product';

    public function __construct(
        private ListingRepositoryInterface $productListingRepository,
        private VendorContextInterface $vendorContext,
        private RequestStack $requestStack
    ) {
    }

    /**
     * @param DraftInterface $value
     */
    public function validate($value, Constraint $constraint): void
    {
        if (!$constraint instanceof ProductListingCodeConstraint) {
            throw new UnexpectedTypeException($constraint, ProductListingCodeConstraint::class);
        }

        /** @var VendorInterface $vendor */
        $vendor = $this->vendorContext->getVendor();
        if ($this->isCreatingNewProductListing()) {
            $productListing = $this->productListingRepository->findByCodeAndVendor($value, $vendor);
        } else {
            $productListing = $this->productListingRepository->findByCodeAndVendorOmitProductListing($value, $vendor, $value->getProductListing());
        }
        if (null !== $productListing) {
            $this->context->addViolation($constraint->message);
        }
    }

    private function isCreatingNewProductListing(): bool
    {
        /** @var Request $request */
        $request = $this->requestStack->getCurrentRequest();

        return
            self::PRODUCT_LISTING_CREATE_PRODUCT_ROUTE
            === $request->attributes->get('_route');
    }
}
