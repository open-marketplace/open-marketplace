<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Fixture\Factory;

use BitBag\OpenMarketplace\Component\Messaging\Entity\ConversationInterface;
use BitBag\OpenMarketplace\Component\Messaging\Entity\MessageInterface;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Repository\Conversation\CategoryRepositoryInterface;
use BitBag\OpenMarketplace\Repository\VendorRepositoryInterface;
use Faker\Factory;
use Faker\Generator;
use Sylius\Bundle\CoreBundle\Fixture\Factory\AbstractExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Bundle\CoreBundle\Fixture\OptionsResolver\LazyOption;
use Sylius\Component\Core\Model\AdminUserInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ConversationExampleFactory extends AbstractExampleFactory implements ExampleFactoryInterface
{
    private FactoryInterface $conversationFactory;

    private FactoryInterface $conversationMessageFactory;

    private VendorRepositoryInterface $vendorRepository;

    private RepositoryInterface $adminUserRepository;

    private CategoryRepositoryInterface $categoryRepository;

    private Generator $faker;

    private OptionsResolver $optionsResolver;

    public function __construct(
        FactoryInterface $conversationFactory,
        FactoryInterface $conversationMessageFactory,
        VendorRepositoryInterface $vendorRepository,
        RepositoryInterface $adminUserRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->conversationFactory = $conversationFactory;
        $this->conversationMessageFactory = $conversationMessageFactory;
        $this->vendorRepository = $vendorRepository;
        $this->adminUserRepository = $adminUserRepository;
        $this->categoryRepository = $categoryRepository;

        $this->faker = Factory::create();
        $this->optionsResolver = new OptionsResolver();

        $this->configureOptions($this->optionsResolver);
    }

    protected function configureOptions(OptionsResolver $resolver): void
    {
        $resolver
            ->setDefault('number_of_messages', fn (Options $options): int => random_int(4, 10))

            ->setDefault('vendor', LazyOption::randomOne($this->vendorRepository))

            ->setDefault('admin_user', LazyOption::randomOne($this->adminUserRepository))

            ->setDefault('category', LazyOption::randomOne($this->categoryRepository));
    }

    public function create(array $options = []): ConversationInterface
    {
        $options = $this->optionsResolver->resolve($options);

        /** @var VendorInterface $vendor */
        $vendor = $options['vendor'];

        /** @var ConversationInterface $conversation */
        $conversation = $this->conversationFactory->createNew();
        $conversation->setShopUser($vendor->getShopUser());
        $conversation->setCategory($options['category']);
        $this->createMessages($conversation, $options['admin_user'], $vendor->getShopUser(), $options['number_of_messages']);

        return $conversation;
    }

    private function createMessages(
        ConversationInterface $conversation,
        AdminUserInterface $adminUser,
        ShopUserInterface $shopUser,
        int $numberOfMessages
    ): void {
        $conversationUsers = [$adminUser, $shopUser];
        for ($i = 0; $i < $numberOfMessages; ++$i) {
            /** @var MessageInterface $message */
            $message = $this->conversationMessageFactory->createNew();
            $message->setAuthor($this->faker->randomElement($conversationUsers));
            $message->setContent($this->faker->sentence);
            $message->setConversation($conversation);
            $conversation->addMessage($message);
        }
    }
}
