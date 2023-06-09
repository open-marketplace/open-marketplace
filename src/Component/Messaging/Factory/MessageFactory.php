<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Messaging\Factory;

use BitBag\OpenMarketplace\Component\Messaging\Entity\MessageInterface;
use BitBag\OpenMarketplace\Component\Messaging\MessagesStorage;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class MessageFactory implements MessageFactoryInterface
{
    private FactoryInterface $conversationMessageFactory;

    public function __construct(FactoryInterface $conversationMessageFactory)
    {
        $this->conversationMessageFactory = $conversationMessageFactory;
    }

    public function createNew(): MessageInterface
    {
        /** @var MessageInterface $message */
        $message = $this->conversationMessageFactory->createNew();

        return $message;
    }

    public function createNewWithArchiveRequest(): MessageInterface
    {
        $message = $this->createNew();
        $message->setContent(MessagesStorage::ARCHIVE_REQUEST_MESSAGE);

        return $message;
    }
}
