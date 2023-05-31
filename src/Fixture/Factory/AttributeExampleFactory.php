<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Fixture\Factory;

use BitBag\OpenMarketplace\Component\ProductListing\DraftCloner\Factory\DraftAttributeFactoryInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeTranslation;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Locale\Model\LocaleInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Webmozart\Assert\Assert;

final class AttributeExampleFactory implements ExampleFactoryInterface
{
    private DraftAttributeFactoryInterface $draftAttributeFactory;

    private EntityRepository $shopUserRepository;

    private RepositoryInterface $localeRepository;

    public function __construct(
        DraftAttributeFactoryInterface $draftAttributeFactory,
        EntityRepository $shopUserRepository,
        RepositoryInterface $localeRepository
    ) {
        $this->draftAttributeFactory = $draftAttributeFactory;
        $this->shopUserRepository = $shopUserRepository;
        $this->localeRepository = $localeRepository;
    }

    public function create(array $options = []): DraftAttributeInterface
    {
        /** @var ShopUserInterface $shopUser */
        $shopUser = $this->shopUserRepository->findOneBy(['username' => $options['vendor']]);
        Assert::notNull($shopUser);

        /** @var VendorInterface $vendor */
        $vendor = $shopUser->getVendor();
        Assert::notNull($vendor);

        $attribute = $this->draftAttributeFactory->createTyped(
            $options['type'],
            $vendor
        );
        $attribute->setCode($options['code']);

        foreach ($this->getLocales() as $locale) {
            $translation = new DraftAttributeTranslation();
            $translation->setName($options['name']);
            $translation->setLocale($locale);
            $translation->setTranslatable($attribute);
        }

        return $attribute;
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
