<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\Entity;

use BitBag\OpenMarketplace\Entity\UuidAwareInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Attribute\Model\AttributeSubjectInterface;
use Sylius\Component\Attribute\Model\AttributeValueInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\ImageInterface;
use Sylius\Component\Core\Model\TaxonInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Shipping\Model\ShippingCategoryInterface;

interface DraftInterface extends AttributeSubjectInterface, ResourceInterface, UuidAwareInterface
{
    public const STATUS_CREATED = 'created';

    public const STATUS_UNDER_VERIFICATION = 'under_verification';

    public const STATUS_VERIFIED = 'verified';

    public const STATUS_REJECTED = 'rejected';

    public function getId(): ?int;

    public function setId(int $id): void;

    public function getCode(): string;

    public function setCode(string $code): void;

    public function isShippingRequired(): bool;

    public function setShippingRequired(bool $shippingRequired): void;

    public function getShippingCategory(): ?ShippingCategoryInterface;

    public function setShippingCategory(?ShippingCategoryInterface $shippingCategory): void;

    public function isVerified(): bool;

    public function setIsVerified(bool $isVerified): void;

    public function getVerifiedAt(): ?\DateTimeInterface;

    public function setVerifiedAt(?\DateTimeInterface $verifiedAt): void;

    public function getPublishedAt(): ?\DateTimeInterface;

    public function setPublishedAt(?\DateTimeInterface $publishedAt): void;

    public function getCreatedAt(): \DateTimeInterface;

    public function setCreatedAt(\DateTimeInterface $createdAt): void;

    public function getVersionNumber(): int;

    public function setVersionNumber(int $versionNumber): void;

    /** @return Collection<int|string, DraftTranslationInterface> */
    public function getTranslations(): Collection;

    /** @param Collection<int|string, DraftTranslationInterface> $translations */
    public function setTranslations(Collection $translations): void;

    public function addTranslation(DraftTranslationInterface $translation): void;

    /** @return Collection<int|string, ListingPriceInterface> */
    public function getProductListingPrices(): Collection;

    public function addProductListingPrice(ListingPriceInterface $productListingPrice): void;

    public function getProductListing(): ListingInterface;

    public function setProductListing(ListingInterface $productListing): void;

    public function getStatus(): string;

    public function setStatus(string $status): void;

    public function incrementVersion(): void;

    public function addTranslationWithKey(DraftTranslationInterface $translation, string $key): void;

    public function addProductListingPriceWithKey(ListingPriceInterface $productListingPrice, string $key): void;

    public function accept(): void;

    public function reject(): void;

    public function sendToVerification(): void;

    /** @return  Collection<int|string, ImageInterface> $images */
    public function getImages(): Collection;

    /** @param Collection<int|string, ImageInterface> $images */
    public function setImages(Collection $images): void;

    public function addImage(ImageInterface $image): void;

    public function removeImage(ImageInterface $image): void;

    public function clearImages(): void;

    /** @return  Collection<int, DraftAttributeValueInterface> */
    public function getAttributes(): Collection;

    /** @return  Collection<int, DraftAttributeValueInterface>  */
    public function getAttributesByLocale(
        string $localeCode,
        string $fallbackLocaleCode,
        ?string $baseLocaleCode = null
    ): Collection;

    public function addAttribute(AttributeValueInterface $attribute): void;

    public function removeAttribute(AttributeValueInterface $attribute): void;

    public function clearAttributes(): void;

    public function hasAttribute(AttributeValueInterface $attribute): bool;

    public function hasAttributeByCodeAndLocale(string $attributeCode, ?string $localeCode = null): bool;

    public function getAttributeByCodeAndLocale(string $attributeCode, ?string $localeCode = null): ?AttributeValueInterface;

    /** @return Collection<array-key, DraftTaxonInterface> */
    public function getProductDraftTaxons(): Collection;

    public function addProductDraftTaxon(DraftTaxonInterface $productDraftTaxons): void;

    public function removeProductDraftTaxon(DraftTaxonInterface $productDraftTaxons): void;

    public function clearProductDraftTaxons(): void;

    /** @return Collection<array-key, ?TaxonInterface> */
    public function getTaxons(): Collection;

    public function hasTaxon(TaxonInterface $taxon): bool;

    public function getMainTaxon(): ?TaxonInterface;

    public function setMainTaxon(?TaxonInterface $mainTaxon): void;

    public function getName(string $locale): ?string;

    public function getSlug(string $locale): ?string;

    public function getVendor(): VendorInterface;

    public function getAnyTranslationName(): ?string;

    public function getProductListingPriceForChannel(ChannelInterface $channel): ?ListingPriceInterface;

    /** @return Collection<array-key, ChannelInterface> */
    public function getChannels(): Collection;

    /** @param Collection<array-key, ChannelInterface> $channels */
    public function setChannels(Collection $channels): void;

    public function addChannel(ChannelInterface $channel): void;

    public function removeChannel(ChannelInterface $channel): void;

    public function isCreated(): bool;

    public function markAsCreated(): void;

    public function ownRelations(): void;
}
