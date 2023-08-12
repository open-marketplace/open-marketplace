<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Common\Fixture;

use BitBag\OpenMarketplace\Component\Core\Common\Fixture\Factory\OrderExampleFactory;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Sylius\Bundle\FixturesBundle\Fixture\AbstractFixture;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

final class OrderFixture extends AbstractFixture
{
    private Generator $faker;

    public function __construct(
        private ObjectManager $orderManager,
        private OrderExampleFactory $orderExampleFactory
    ) {
        $this->faker = Factory::create();
    }

    public function load(array $options): void
    {
        $generateDates = $this->generateDates($options['amount']);

        for ($i = 0; $i < $options['amount']; ++$i) {
            $options = array_merge($options, ['complete_date' => array_shift($generateDates)]);

            $orders = $this->orderExampleFactory->createArray($options);

            foreach ($orders as $order) {
                $this->orderManager->persist($order);
            }

            if (0 === ($i % 50)) {
                $this->orderManager->flush();
            }
        }

        $this->orderManager->flush();
    }

    public function getName(): string
    {
        return 'open_marketplace_order';
    }

    protected function configureOptionsNode(ArrayNodeDefinition $optionsNode): void
    {
        $optionsNode
            ->children()
                ->integerNode('amount')->isRequired()->min(0)->end()
                ->scalarNode('channel')->cannotBeEmpty()->end()
                ->scalarNode('customer')->cannotBeEmpty()->end()
                ->scalarNode('country')->cannotBeEmpty()->end()
                ->booleanNode('fulfilled')->defaultValue(false)->end()
            ->end()
        ;
    }

    private function generateDates(int $amount): array
    {
        /** @var \DateTimeInterface[] $dates */
        $dates = [];

        for ($i = 0; $i < $amount; ++$i) {
            $dates[] = $this->faker->dateTimeBetween('-1 years', 'now');
        }

        sort($dates);

        return $dates;
    }
}
