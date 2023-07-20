<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Messaging;

use BitBag\OpenMarketplace\Component\Core\Common\Resolver\CurrentUserResolverInterface;
use BitBag\OpenMarketplace\Component\Messaging\Entity\ConversationInterface;
use BitBag\OpenMarketplace\Component\Messaging\Entity\MessageInterface;
use BitBag\OpenMarketplace\Component\Messaging\Repository\ConversationRepositoryInterface;
use BitBag\OpenMarketplace\Uploader\FileUploaderInterface;
use Sylius\Component\User\Model\UserInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;

final class MessagePersister implements MessagePersisterInterface
{
    public function __construct(
        private CurrentUserResolverInterface $currentUserResolver,
        private FileUploaderInterface $fileUploader,
        private ConversationRepositoryInterface $conversationRepository
    ) {

    }

    public function createWithConversation(
        int $conversationId,
        MessageInterface $message,
        ?UploadedFile $file = null,
        bool $stripTags = true
    ): void {
        /** @var ?UserInterface $currentUser */
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
