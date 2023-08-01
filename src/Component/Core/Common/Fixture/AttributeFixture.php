<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Common\Fixture;

use Doctrine\ORM\EntityManagerInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Bundle\FixturesBundle\Fixture\AbstractFixture;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

final class AttributeFixture extends AbstractFixture
{
    public function __construct(
        private ExampleFactoryInterface $attributeExampleFactory,
        private EntityManagerInterface $attributeManager,
    ) {

    }

    public function getName(): string
    {
        return 'draft_attribute';
    }

    public function load(array $options): void
    {
        $i = 0;
        foreach ($options['custom'] as $attributeData) {
            $attribute = $this->attributeExampleFactory->create($attributeData);
            $this->attributeManager->persist($attribute);

            if (0 === ($i % 50)) {
                $this->attributeManager->flush();
            }

            ++$i;
        }

        $this->attributeManager->flush();
    }

    protected function configureOptionsNode(ArrayNodeDefinition $optionsNode): void
    {
        $optionsNode
            ->children()
                ->arrayNode('custom')
                    ->arrayPrototype()
                        ->children()
                            ->scalarNode('vendor')->end()
                            ->scalarNode('code')->end()
                            ->scalarNode('name')->end()
                            ->scalarNode('type')->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}
