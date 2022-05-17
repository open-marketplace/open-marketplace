<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Provider\Email;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Conversation\ConversationInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Resolver\ActualUserResolverInterface;
use Sylius\Component\Core\Model\AdminUserInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

final class RecipientsEmailsCollectionProvider implements RecipientsEmailsCollectionProviderInterface
{
    private ActualUserResolverInterface $actualUserResolver;

    private RepositoryInterface $adminUserRepository;

    public function __construct(
        ActualUserResolverInterface $actualUserResolver,
        RepositoryInterface $adminUserRepository
    )
    {
        $this->actualUserResolver = $actualUserResolver;
        $this->adminUserRepository = $adminUserRepository;
    }

    public function provideEmailsCollection(ConversationInterface $conversation): array
    {
        $currentUser = $this->actualUserResolver->resolve();
        $recipientsEmailsCollection = [];

        if ($currentUser instanceof AdminUserInterface) {
            $recipientsEmailsCollection[] = $conversation->getApplicant()->getEmail();
            return $recipientsEmailsCollection;
        }

        $adminUsers = $this->adminUserRepository->findAll();

        foreach ($adminUsers as $adminUser) {
            $recipientsEmailsCollection[] = $adminUser->getEmail();
        }

        return $recipientsEmailsCollection;
    }
}
