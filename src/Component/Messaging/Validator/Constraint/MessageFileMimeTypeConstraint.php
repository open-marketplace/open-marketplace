<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Messaging\Validator\Constraint;

use Symfony\Component\Validator\Constraint;

final class MessageFileMimeTypeConstraint extends Constraint
{
    public string $message = 'validator.message.messaging.message.not_allowed_mime_types';

    private string $service = 'bitbag.open_marketplace.component.messaging.validator.message_file_mime_type';

    public function validatedBy()
    {
        return $this->service;
    }
}
