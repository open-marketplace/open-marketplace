<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Fixture\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Action\StateMachine\Transition\ProductDraftStateMachineTransitionInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ProductListingFromDraftFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\VendorRepositoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Transitions\ProductDraftTransitions;
use Faker\Factory;
use Faker\Generator;
use Sylius\Bundle\CoreBundle\Fixture\Factory\AbstractExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Bundle\CoreBundle\Fixture\OptionsResolver\LazyOption;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ProductDraftExampleFactory extends AbstractExampleFactory implements ExampleFactoryInterface
{
    private Generator $faker;

    private OptionsResolver $optionsResolver;

    private FactoryInterface $productDraftFactory;

    private ProductListingFromDraftFactoryInterface $productListingFromDraftFactory;

    private VendorRepositoryInterface $vendorRepository;

    private ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition;

    public function __construct(
        FactoryInterface $productDraftFactory,
        ProductListingFromDraftFactoryInterface $productListingFromDraftFactory,
        VendorRepositoryInterface $vendorRepository,
        ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition
    ) {
        $this->productDraftFactory = $productDraftFactory;
        $this->productListingFromDraftFactory = $productListingFromDraftFactory;
        $this->vendorRepository = $vendorRepository;
        $this->productDraftStateMachineTransition = $productDraftStateMachineTransition;
        $this->faker = Factory::create();
        $this->optionsResolver = new OptionsResolver();

        $this->configureOptions($this->optionsResolver);
    }

    protected function configureOptions(OptionsResolver $resolver): void
    {
        $resolver
            ->setDefault('amount', 20)
            ->setDefault('vendor', LazyOption::randomOne($this->vendorRepository))
            ->setDefault('added', false)
            ->setDefault('accepted', false)
            ->setDefault('rejected', false)
        ;
    }

    public function create(array $options = []): ProductDraftInterface
    {
        $options = $this->optionsResolver->resolve($options);

        /** @var ProductDraftInterface $productDraft */
        $productDraft = $this->productDraftFactory->createNew();

        $productDraft->setCode($this->faker->uuid);

        $productDraft = $this->productListingFromDraftFactory->createNew($productDraft, $options['vendor']);

        if (true === $options['added']) {
            $this->productDraftStateMachineTransition->applyIfCan($productDraft, ProductDraftTransitions::TRANSITION_SEND_TO_VERIFICATION);
        }

        if (true === $options['accepted']) {
            $this->productDraftStateMachineTransition->applyIfCan($productDraft, ProductDraftTransitions::TRANSITION_ACCEPT);
        }

        if (true === $options['rejected']) {
            $this->productDraftStateMachineTransition->applyIfCan($productDraft, ProductDraftTransitions::TRANSITION_REJECT);
        }

        return $productDraft;
    }

    private function createProductListingPricing()
    {
    }
}
