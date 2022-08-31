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
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingPriceInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductTranslationInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ProductListingFromDraftFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\VendorRepositoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Transitions\ProductDraftTransitions;
use Faker\Factory;
use Faker\Generator;
use Sylius\Bundle\CoreBundle\Fixture\Factory\AbstractExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Bundle\CoreBundle\Fixture\OptionsResolver\LazyOption;
use Sylius\Component\Channel\Repository\ChannelRepositoryInterface;
use Sylius\Component\Core\Formatter\StringInflector;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Locale\Model\LocaleInterface;
use Sylius\Component\Product\Generator\SlugGeneratorInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ProductDraftExampleFactory extends AbstractExampleFactory implements ExampleFactoryInterface
{
    private Generator $faker;

    private OptionsResolver $optionsResolver;

    private FactoryInterface $productDraftFactory;

    private FactoryInterface $productListingPriceFactory;

    private ProductListingFromDraftFactoryInterface $productListingFromDraftFactory;

    private FactoryInterface $productTranslationFactory;

    private VendorRepositoryInterface $vendorRepository;

    private ChannelRepositoryInterface $channelRepository;

    private RepositoryInterface $localeRepository;

    private ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition;

    private SlugGeneratorInterface $slugGenerator;

    public function __construct(
        FactoryInterface $productDraftFactory,
        FactoryInterface $productListingPriceFactory,
        ProductListingFromDraftFactoryInterface $productListingFromDraftFactory,
        FactoryInterface $productTranslationFactory,
        VendorRepositoryInterface $vendorRepository,
        ChannelRepositoryInterface $channelRepository,
        RepositoryInterface $localeRepository,
        ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition,
        SlugGeneratorInterface $slugGenerator
    ) {
        $this->productDraftFactory = $productDraftFactory;
        $this->productListingPriceFactory = $productListingPriceFactory;
        $this->productListingFromDraftFactory = $productListingFromDraftFactory;
        $this->productTranslationFactory = $productTranslationFactory;
        $this->vendorRepository = $vendorRepository;
        $this->channelRepository = $channelRepository;
        $this->localeRepository = $localeRepository;
        $this->productDraftStateMachineTransition = $productDraftStateMachineTransition;
        $this->slugGenerator = $slugGenerator;
        $this->faker = Factory::create();
        $this->optionsResolver = new OptionsResolver();

        $this->configureOptions($this->optionsResolver);
    }

    protected function configureOptions(OptionsResolver $resolver): void
    {
        $resolver
            ->setDefault('name', function (Options $options): string {
                /** @var string $words */
                $words = $this->faker->words(3, true);

                return $words;
            })
            ->setDefault('code', fn (Options $options): string => StringInflector::nameToCode($options['name']))
            ->setDefault('slug', fn (Options $options): string => $this->slugGenerator->generate($options['name']))
            ->setDefault('description', function (Options $options): string {
                /** @var string $paragraphs */
                $paragraphs = $this->faker->paragraphs(3, true);

                return $paragraphs;
            })
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

        $productDraft->setCode($options['code']);

        $productDraft = $this->productListingFromDraftFactory->createNew($productDraft, $options['vendor']);

        /** @var ChannelInterface $channel */
        foreach ($this->channelRepository->findAll() as $channel) {
            $code = $channel->getCode();
            if (null === $code) {
                continue;
            }
            $this->createProductListingPricing($productDraft, $code);
        }

        $this->createTranslations($productDraft, $options);

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

    private function createProductListingPricing(ProductDraftInterface $productDraft, string $channelCode): void
    {
        /** @var ProductListingPriceInterface $productListingPrice */
        $productListingPrice = $this->productListingPriceFactory->createNew();
        $productListingPrice->setChannelCode($channelCode);
        $productListingPrice->setPrice($this->faker->numberBetween(100, 10000));
        $productListingPrice->setOriginalPrice($this->faker->numberBetween(100, 10000));
        $productListingPrice->setMinimumPrice(0);
        $productListingPrice->setProductDraft($productDraft);

        $productDraft->addProductListingPrice($productListingPrice);
    }

    private function createTranslations(ProductDraftInterface $productDraft, array $options): void
    {
        foreach ($this->getLocales() as $localeCode) {
            /** @var ProductTranslationInterface $productDraftTranslation */
            $productDraftTranslation = $this->productTranslationFactory->createNew();
            $productDraftTranslation->setLocale($localeCode);
            $productDraftTranslation->setName($options['name']);
            $productDraftTranslation->setSlug($options['slug']);
            $productDraftTranslation->setDescription($options['description']);
            $productDraftTranslation->setShortDescription(null);
            $productDraftTranslation->setMetaDescription(null);
            $productDraftTranslation->setMetaKeywords(null);
            $productDraftTranslation->setProductDraft($productDraft);
            $productDraft->addTranslations($productDraftTranslation);
        }
    }

    private function getLocales(): iterable
    {
        /** @var LocaleInterface[] $locales */
        $locales = $this->localeRepository->findAll();
        foreach ($locales as $locale) {
            yield $locale->getCode();
        }
    }
}
