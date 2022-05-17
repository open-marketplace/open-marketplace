<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Fixture;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Conversation\Category;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\Conversation\CategoryRepositoryInterface;
use Sylius\Bundle\FixturesBundle\Fixture\AbstractFixture;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

final class ConversationCategoryFixture extends AbstractFixture
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function load(array $options): void
    {
        foreach ($options['categories'] as $conversationCategory) {
            $entity = new Category();
            $entity->setName($conversationCategory);
            $this->categoryRepository->add($entity);
        }
    }

    public function getName(): string
    {
        return 'conversation_categories';
    }

    protected function configureOptionsNode(ArrayNodeDefinition $resourceNode): void
    {
        $resourceNode
            ->children()
            ->arrayNode('categories')->scalarPrototype()->end()->end()
            ->end()
        ;
    }
}
