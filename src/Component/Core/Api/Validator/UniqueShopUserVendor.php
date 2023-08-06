<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Api\Validator;

use Symfony\Component\Validator\Constraint;

final class UniqueShopUserVendor extends Constraint
{
    public string $message = 'validator.message.vendor_already_exists';

    public ?string $errorPath = null;

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }

    public function validatedBy(): string
    {
        return 'bitbag.sylius_open_marketplace_plugin.validator.unique_shop_user_vendor';
    }
}
