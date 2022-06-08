<?php
/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Facade\Message;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Conversation\ConversationInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Conversation\MessageInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Facade\Message\AddMessageFacade;
use BitBag\SyliusMultiVendorMarketplacePlugin\Facade\Message\AddMessageFacadeInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\Conversation\ConversationRepositoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Resolver\ActualUserResolverInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Uploader\FileUploaderInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\AdminUserInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;

final class AddMessageFacadeSpec extends ObjectBehavior
{
    function let(
        ActualUserResolverInterface $actualUserResolver,
        FileUploaderInterface $fileUploader,
        ConversationRepositoryInterface $conversationRepository
    ) {
        $this->beConstructedWith($actualUserResolver, $fileUploader, $conversationRepository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(AddMessageFacade::class);
        $this->shouldImplement(AddMessageFacadeInterface::class);
    }

    function it_process_message_and_add_it_to_given_conversation(
        ActualUserResolverInterface $actualUserResolver,
        FileUploaderInterface $fileUploader,
        ConversationRepositoryInterface $conversationRepository,
        UserInterface $user,
        MessageInterface $message,
        ConversationInterface $conversation
    ): void {
        $file = new UploadedFile('tests/Application/public/uploads/message_files/test.txt', 'test.txt');
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

    function it_process_message_admin_create_not_send_file(
        ActualUserResolverInterface $actualUserResolver,
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

    function it_throws_exception_if_user_is_not_found(
        ActualUserResolverInterface $actualUserResolver,
        MessageInterface $message
    ): void {
        $actualUserResolver->resolve()->willReturn(null);

        $this->shouldThrow(UserNotFoundException::class)
            ->during('createWithConversation',[
                1,
                $message
            ]);

    }
}