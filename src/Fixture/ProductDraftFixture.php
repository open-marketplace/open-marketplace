<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Fixture;

use BitBag\SyliusMultiVendorMarketplacePlugin\Fixture\Factory\ProductDraftExampleFactory;
use Doctrine\Persistence\ObjectManager;
use Sylius\Bundle\FixturesBundle\Fixture\AbstractFixture;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

final class ProductDraftFixture extends AbstractFixture
{
    private ObjectManager $productDraftManager;

    private ProductDraftExampleFactory $productDraftExampleFactory;

    public function __construct(ObjectManager $productDraftManager, ProductDraftExampleFactory $productDraftExampleFactory)
    {
        $this->productDraftManager = $productDraftManager;
        $this->productDraftExampleFactory = $productDraftExampleFactory;
    }

    public function load(array $options): void
    {
        for ($i = 0; $i < $options['amount']; ++$i) {
            $productDraft = $this->productDraftExampleFactory->create($options);

            $this->productDraftManager->persist($productDraft);

            if (0 === ($i % 50)) {
                $this->productDraftManager->flush();
            }
        }

        $this->productDraftManager->flush();
    }

    protected function configureOptionsNode(ArrayNodeDefinition $optionsNode): void
    {
        $optionsNode
            ->children()
                ->integerNode('amount')->isRequired()->min(0)->end()
                ->booleanNode('added')->defaultValue(false)->end()
                ->booleanNode('accepted')->defaultValue(false)->end()
                ->booleanNode('rejected')->defaultValue(false)->end()
                ->arrayNode('images')->variablePrototype()->end()->end()
            ->end()
        ;
    }

    public function getName(): string
    {
        return 'product_draft';
    }
}
