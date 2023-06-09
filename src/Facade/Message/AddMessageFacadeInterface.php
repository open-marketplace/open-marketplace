<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Facade\Message;

use BitBag\OpenMarketplace\Component\Messaging\Entity\MessageInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface AddMessageFacadeInterface
{
    public function createWithConversation(
        int $conversationId,
        MessageInterface $message,
        ?UploadedFile $file = null,
        bool $stripTags = true
    ): void;
}
