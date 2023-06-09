<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Messaging\Factory;

use BitBag\OpenMarketplace\Component\Messaging\Factory\MessageFactory;
use BitBag\OpenMarketplace\Component\Messaging\Factory\MessageFactoryInterface;
use BitBag\OpenMarketplace\Component\Messaging\MessagesStorage;
use BitBag\OpenMarketplace\Entity\Conversation\MessageInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class MessageFactorySpec extends ObjectBehavior
{
    public function let(FactoryInterface $conversationMessageFactory)
    {
        $this->beConstructedWith($conversationMessageFactory);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(MessageFactory::class);
        $this->shouldImplement(MessageFactoryInterface::class);
    }

    public function it_create_new_message(
        FactoryInterface $conversationMessageFactory,
        MessageInterface $message
    ): void {
        $conversationMessageFactory->createNew()->willReturn($message);

        $this->createNew()->shouldReturn($message);
    }

    public function it_create_new_with_archive_request(
        FactoryInterface $conversationMessageFactory,
        MessageInterface $message
    ): void {
        $conversationMessageFactory->createNew()->willReturn($message);
        $message->setContent(MessagesStorage::ARCHIVE_REQUEST_MESSAGE)->shouldBeCalled();

        $this->createNewWithArchiveRequest()
            ->shouldReturn($message);
    }
}
