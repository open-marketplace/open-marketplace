<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Fixture\Fixture;

use BitBag\OpenMarketplace\Component\Messaging\Entity\CategoryInterface;
use Doctrine\Persistence\ObjectManager;
use Sylius\Bundle\FixturesBundle\Fixture\AbstractFixture;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

final class ConversationCategoryFixture extends AbstractFixture
{
    public function __construct(
        private ObjectManager $conversationCategoryManager,
        private FactoryInterface $conversationCategoryFactory
    ) {

    }

    public function load(array $options): void
    {
        $categories = $options['categories'];

        foreach ($categories as $categoryName) {
            /** @var CategoryInterface $category */
            $category = $this->conversationCategoryFactory->createNew();

            $category->setName($categoryName);

            $this->conversationCategoryManager->persist($category);
        }

        $this->conversationCategoryManager->flush();
    }

    public function getName(): string
    {
        return 'conversation_category';
    }

    protected function configureOptionsNode(ArrayNodeDefinition $optionsNode): void
    {
        $optionsNode
            ->children()
                ->arrayNode('categories')->scalarPrototype()->end()
        ;
    }
}
