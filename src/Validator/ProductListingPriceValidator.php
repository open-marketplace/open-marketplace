<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Validator;

use BitBag\OpenMarketplace\Validator\Constraint\ProductListingPriceConstraint;
use Sylius\Component\Core\Model\ChannelPricingInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Webmozart\Assert\Assert;

class ProductListingPriceValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint): void
    {

    }
}
