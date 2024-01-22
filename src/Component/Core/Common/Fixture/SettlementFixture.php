<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Common\Fixture;

use Sylius\Bundle\CoreBundle\Fixture\AbstractResourceFixture;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

final class SettlementFixture extends AbstractResourceFixture
{
    public function getName(): string
    {
        return 'settlement';
    }

    protected function configureResourceNode(ArrayNodeDefinition $resourceNode): void
    {
        $resourceNode
            ->children()
            ->scalarNode('vendor')->isRequired()->end()
            ->scalarNode('status')->cannotBeEmpty()->end()
            ->scalarNode('totalAmount')->cannotBeEmpty()->end()
            ->scalarNode('totalCommissionAmount')->cannotBeEmpty()->end()
            ->scalarNode('channel')->isRequired()->end()
            ->scalarNode('startDate')->end()
            ->scalarNode('endDate')->end()
            ->end()
        ;
    }
}
