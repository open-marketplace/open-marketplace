<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Common\Fixture;

use BitBag\OpenMarketplace\Component\Core\Common\Fixture\Factory\ProductListingExampleFactory;
use Doctrine\Persistence\ObjectManager;
use Sylius\Bundle\FixturesBundle\Fixture\AbstractFixture;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

final class ProductListingFixture extends AbstractFixture
{
    public function __construct(
        private ObjectManager $productDraftManager,
        private ProductListingExampleFactory $productDraftExampleFactory
    ) {

    }

    public function load(array $options): void
    {
        $i = 0;
        foreach ($options['custom'] as $productListingData) {
            $productDraft = $this->productDraftExampleFactory->create($productListingData);
            $this->productDraftManager->persist($productDraft);

            if (0 === ($i % 50)) {
                $this->productDraftManager->flush();
            }

            ++$i;
        }

        $this->productDraftManager->flush();
    }

    protected function configureOptionsNode(ArrayNodeDefinition $optionsNode): void
    {
        $optionsNode
            ->children()
                ->arrayNode('custom')
                    ->arrayPrototype()
                        ->children()
                        ->scalarNode('vendor')->isRequired()->end()
                        ->scalarNode('code')->isRequired()->end()
                        ->scalarNode('name')->isRequired()->end()
                        ->scalarNode('main_taxon')->isRequired()->end()
                        ->arrayNode('taxons')
                            ->scalarPrototype()->end()
                        ->end()
                        ->arrayNode('images')
                            ->scalarPrototype()->end()
                        ->end()
                        ->arrayNode('attributes')
                            ->arrayPrototype()
                            ->children()
                                ->scalarNode('code')->end()
                                ->scalarNode('value')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }

    public function getName(): string
    {
        return 'product_listing';
    }
}
