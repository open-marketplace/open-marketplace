<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\Controller\Vendor;

use BitBag\OpenMarketplace\Api\Controller\Vendor\DeleteProductListingAction;
use BitBag\OpenMarketplace\Entity\ProductInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListingInterface;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;
use Symfony\Component\HttpFoundation\JsonResponse;

final class DeleteProductListingActionSpec extends ObjectBehavior
{
    public function let(EntityManagerInterface $entityManager): void
    {
        $this->beConstructedWith($entityManager);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(DeleteProductListingAction::class);
    }

    public function it_deletes_product_listing_without_product(
        ProductListingInterface $productListing,
        EntityManagerInterface $entityManager
    ): void {
        $productListing->getProduct()->willReturn(null);

        $this($productListing)->shouldBeAnInstanceOf(JsonResponse::class);

        $productListing->setRemoved(true)->shouldHaveBeenCalled();
        $entityManager->persist($productListing)->shouldHaveBeenCalled();
        $entityManager->flush()->shouldHaveBeenCalled();
    }

    public function it_deletes_product_listing_with_product(
        ProductListingInterface $productListing,
        EntityManagerInterface $entityManager,
        ProductInterface $product
    ): void {
        $productListing->getProduct()->willReturn($product);

        $this($productListing)->shouldBeAnInstanceOf(JsonResponse::class);

        $productListing->setRemoved(true)->shouldHaveBeenCalled();
        $product->setEnabled(false)->shouldHaveBeenCalled();
        $entityManager->persist($product)->shouldHaveBeenCalled();
        $entityManager->persist($productListing)->shouldHaveBeenCalled();
        $entityManager->flush()->shouldHaveBeenCalled();
    }
}
