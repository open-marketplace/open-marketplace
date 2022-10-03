<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Facade\Message;

use BitBag\OpenMarketplace\Entity\Conversation\ConversationInterface;
use BitBag\OpenMarketplace\Entity\Conversation\MessageInterface;
use BitBag\OpenMarketplace\Facade\Message\AddMessageFacade;
use BitBag\OpenMarketplace\Facade\Message\AddMessageFacadeInterface;
use BitBag\OpenMarketplace\Repository\Conversation\ConversationRepositoryInterface;
use BitBag\OpenMarketplace\Resolver\CurrentUserResolverInterface;
use BitBag\OpenMarketplace\Uploader\FileUploaderInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\AdminUserInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;

final class AddMessageFacadeSpec extends ObjectBehavior
{
    public function let(
        CurrentUserResolverInterface $actualUserResolver,
        FileUploaderInterface $fileUploader,
        ConversationRepositoryInterface $conversationRepository
    ) {
        $this->beConstructedWith($actualUserResolver, $fileUploader, $conversationRepository);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(AddMessageFacade::class);
        $this->shouldImplement(AddMessageFacadeInterface::class);
    }

    public function it_processes_message_and_adds_it_to_given_conversation(
        CurrentUserResolverInterface $actualUserResolver,
        FileUploaderInterface $fileUploader,
        ConversationRepositoryInterface $conversationRepository,
        UserInterface $user,
        MessageInterface $message,
        ConversationInterface $conversation
    ): void {
        $file = new UploadedFile('public/uploads/message_files/test.txt', 'test.txt');
        $filename = 'filename';
        $messageContent = 'messageContent';
        $actualUserResolver->resolve()->willReturn($user);
        $conversationRepository->find(1)->willReturn($conversation);
        $fileUploader->upload($file)->willReturn($filename);
        $message->setFilename($filename)->shouldBeCalled();
        $message->getContent()->willReturn($messageContent);
        $message->setContent(strip_tags($messageContent))->shouldBeCalled();

        $message->setAuthor($user)->shouldBeCalled();

        $conversation->addMessage($message)->shouldBeCalled();

        $conversationRepository->add($conversation)->shouldBeCalled();

        $this->createWithConversation(1, $message, $file, true);
    }

    public function it_processes_message_admin_create_not_send_file(
        CurrentUserResolverInterface $actualUserResolver,
        FileUploaderInterface $fileUploader,
        ConversationRepositoryInterface $conversationRepository,
        AdminUserInterface $admin,
        MessageInterface $message,
        ConversationInterface $conversation
    ): void {
        $messageContent = 'messageContent';
        $actualUserResolver->resolve()->willReturn($admin);
        $conversationRepository->find(1)->willReturn($conversation);
        $message->getContent()->willReturn($messageContent);
        $message->setContent(strip_tags($messageContent))->shouldBeCalled();

        $message->setAuthor($admin)->shouldBeCalled();

        $conversation->addMessage($message)->shouldBeCalled();

        $conversationRepository->add($conversation)->shouldBeCalled();

        $this->createWithConversation(1, $message, null, true);
    }

    public function it_throws_exception_if_user_is_not_found(
        CurrentUserResolverInterface $actualUserResolver,
        MessageInterface $message
    ): void {
        $actualUserResolver->resolve()->willReturn(null);

        $this->shouldThrow(UserNotFoundException::class)
            ->during('createWithConversation', [
                1,
                $message,
            ]);
    }

    public function it_doesnt_strip_tags_on_false_parameter(
        CurrentUserResolverInterface $actualUserResolver,
        FileUploaderInterface $fileUploader,
        ConversationRepositoryInterface $conversationRepository,
        AdminUserInterface $admin,
        UserInterface $user,
        MessageInterface $message,
        ConversationInterface $conversation
    ): void {
        $messageContent = 'messageContent';
        $actualUserResolver->resolve()->willReturn($admin);
        $conversationRepository->find(1)->willReturn($conversation);
        $message->getContent()->willReturn($messageContent);
        $message->setContent(strip_tags($messageContent))->shouldNotBeCalled();

        $message->setAuthor($admin)->shouldBeCalled();

        $conversation->addMessage($message)->shouldBeCalled();

        $conversationRepository->add($conversation)->shouldBeCalled();

        $this->createWithConversation(1, $message, null, false);
    }

    public function it_adds_file(
        CurrentUserResolverInterface $actualUserResolver,
        FileUploaderInterface $fileUploader,
        ConversationRepositoryInterface $conversationRepository,
        UserInterface $user,
        MessageInterface $message,
        ConversationInterface $conversation
    ): void {
        $file = new UploadedFile('public/uploads/message_files/test.txt', 'test.txt');
        $filename = 'filename';
        $messageContent = 'messageContent';
        $actualUserResolver->resolve()->willReturn($user);
        $conversationRepository->find(1)->willReturn($conversation);

        $fileUploader->upload($file)->willReturn($filename);
        $message->setFilename($filename)->shouldBeCalled();

        $message->getContent()->willReturn($messageContent);
        $message->setContent(strip_tags($messageContent))->shouldBeCalled();

        $message->setAuthor($user)->shouldBeCalled();

        $conversation->addMessage($message)->shouldBeCalled();

        $conversationRepository->add($conversation)->shouldBeCalled();

        $this->createWithConversation(1, $message, $file, true);
    }
}
