<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Messaging\Validator;

use BitBag\OpenMarketplace\Component\Messaging\Validator\Constraint\MessageFileMimeTypeConstraint;
use LogicException;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Mime\MimeTypes;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

final class MessageFileMimeTypeValidator extends ConstraintValidator
{
    public function __construct(
        private array $notAllowedMimeTypes
    ) {
    }

    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof MessageFileMimeTypeConstraint) {
            throw new UnexpectedTypeException($constraint, MessageFileMimeTypeConstraint::class);
        }

        if (null === $value || '' === $value) {
            return;
        }

        $path = $value instanceof File ? $value->getPathname() : (string) $value;

        if ($value instanceof File) {
            $mime = $value->getMimeType();
        } elseif (class_exists(MimeTypes::class)) {
            $mime = MimeTypes::getDefault()->guessMimeType($path);
        } elseif (!class_exists(File::class)) {
            throw new LogicException('You cannot validate the mime-type of files as the Mime component is not installed. Try running "composer require symfony/mime".');
        } else {
            $mime = (new File($value))->getMimeType();
        }

        foreach ($this->notAllowedMimeTypes as $mimeType) {
            if ($mimeType === $mime) {
                $this->context->addViolation(
                    $constraint->message,
                    [
                        '{{ type }}' => $this->formatValue($mime),
                    ]
                );

                return;
            }
        }
    }
}
