<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Validator;

use BitBag\OpenMarketplace\Entity\ProductListing\ProductListingPriceInterface;
use BitBag\OpenMarketplace\Validator\Constraint\ProductListingPriceConstraint;
use Sylius\Component\Channel\Repository\ChannelRepositoryInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Webmozart\Assert\Assert;

final class ProductListingPriceValidator extends ConstraintValidator
{
    public function __construct(private ChannelRepositoryInterface $channelRepository)
    {
    }

    public function validate($value, Constraint $constraint): void
    {
        Assert::isInstanceOf($constraint, ProductListingPriceConstraint::class);

        $channels = $this->channelRepository->findAll();

        foreach ($channels as $channel) {
            /** @var ProductListingPriceInterface|null $productListingPrice */
            $productListingPrice = $value->getProductListingPriceForChannel($channel);
            if (null === $productListingPrice || null === $productListingPrice->getPrice()) {
                $this->context->buildViolation($constraint->message)
                    ->addViolation()
                ;

                return;
            }
        }
    }
}
