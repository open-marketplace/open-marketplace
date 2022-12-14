<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\DataTransformer;

use BitBag\OpenMarketplace\Api\DataTransformer\ProductDraftAwareCommandDataTransformer;
use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\ProductDraftAwareInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraft;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Factory\ProductDraftImageFactoryInterface;
use Doctrine\Common\Collections\Collection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Bundle\ApiBundle\Context\UserContextInterface;
use Sylius\Component\Core\Model\ImageInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\FileBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

final class ProductDraftAwareCommandDataTransformerSpec extends ObjectBehavior
{
    public function let(
        RequestStack $requestStack,
        ProductDraftImageFactoryInterface $draftImageFactory
    ): void {
        $this->beConstructedWith($requestStack, $draftImageFactory);
    }
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ProductDraftAwareCommandDataTransformer::class);
    }

    public function it_supports_product_draft_aware_interface(
        ProductDraftAwareInterface $productDraftAware
    ): void {
        $this->supportsTransformation($productDraftAware)->shouldReturn(true);
    }

    public function it_does_nothing_when_there_is_no_product_draft_assigned(
        ProductDraftAwareInterface $productDraftAware,
        RequestStack $requestStack
    ): void {
        $productDraftAware->getProductDraft()->willReturn(null);

        $requestStack->getCurrentRequest()->shouldNotBeCalled();

        $this->transform($productDraftAware, '');
    }

    public function it_does_nothing_when_there_is_no_images_in_request(
        ProductDraftAwareInterface $productDraftAware,
        ProductDraft $productDraft,
        ProductDraftImageFactoryInterface $draftImageFactory,
        RequestStack $requestStack,
        Request $request,
    ): void {
        $productDraftAware->getProductDraft()->willReturn($productDraft);
        $request->files = new FileBag();
        $requestStack->getCurrentRequest()->willReturn($request);

        $productDraft->getImages()->shouldNotBeCalled();
        $draftImageFactory->createNew()->shouldNotBeCalled();

        $this->transform($productDraftAware, '');
    }

    public function it_sets_images_when_there_is_one_in_request(
        ProductDraftAwareInterface $productDraftAware,
        ProductDraft $productDraft,
        ProductDraftImageFactoryInterface $draftImageFactory,
        RequestStack $requestStack,
        Request $request,
        ImageInterface $draftImage,
        Collection $imagesCollection
    ): void {
        $productDraftAware->getProductDraft()->willReturn($productDraft);
        $imageFile = new UploadedFile(__FILE__, 'test');
        $request->files = new FileBag(['images' => [$imageFile]]);
        $requestStack->getCurrentRequest()->willReturn($request);

        $productDraft->getImages()->willReturn($imagesCollection);
        $imagesCollection->clear()->shouldBeCalled();
        $draftImageFactory->createNew()->willReturn($draftImage);

        $draftImage->setFile($imageFile)->shouldBeCalled();
        $productDraft->addImage($draftImage)->shouldBeCalled();

        $this->transform($productDraftAware, '');
    }
}
