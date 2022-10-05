<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Facade\Message;

use BitBag\OpenMarketplace\Entity\Conversation\ConversationInterface;
use BitBag\OpenMarketplace\Entity\Conversation\MessageInterface;
use BitBag\OpenMarketplace\Repository\Conversation\ConversationRepositoryInterface;
use BitBag\OpenMarketplace\Resolver\CurrentUserResolverInterface;
use BitBag\OpenMarketplace\Uploader\FileUploaderInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;

final class AddMessageFacade implements AddMessageFacadeInterface
{
    private CurrentUserResolverInterface $currentUserResolver;

    private FileUploaderInterface $fileUploader;

    private ConversationRepositoryInterface $conversationRepository;

    public function __construct(
        CurrentUserResolverInterface $currentUserResolver,
        FileUploaderInterface $fileUploader,
        ConversationRepositoryInterface $conversationRepository
    ) {
        $this->currentUserResolver = $currentUserResolver;
        $this->fileUploader = $fileUploader;
        $this->conversationRepository = $conversationRepository;
    }

    public function createWithConversation(
        int $conversationId,
        MessageInterface $message,
        ?UploadedFile $file = null,
        bool $stripTags = true
    ): void {
        $currentUser = $this->currentUserResolver->resolve();

        if (!$currentUser) {
            throw new UserNotFoundException();
        }

        /** @var ConversationInterface $conversation */
        $conversation = $this->conversationRepository->find($conversationId);

        if ($file) {
            $filename = $this->fileUploader->upload($file);
            $message->setFilename($filename);
        }

        if ($stripTags) {
            $message->setContent(strip_tags($message->getContent()));
        }

        $message->setAuthor($currentUser);

        $conversation->addMessage($message);
        $this->conversationRepository->add($conversation);
    }
}
