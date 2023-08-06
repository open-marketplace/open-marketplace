<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Core\Api\DataTransformer;

use BitBag\OpenMarketplace\Component\Core\Api\DataTransformer\ResourceIdAwareCommandDataTransformer;
use BitBag\OpenMarketplace\Component\Core\Api\Messenger\Command\ResourceIdAwareInterface;
use PhpSpec\ObjectBehavior;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

final class ResourceIdAwareCommandDataTransformerSpec extends ObjectBehavior
{
    public function let(
        RequestStack $requestStack
    ): void {
        $this->beConstructedWith($requestStack);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ResourceIdAwareCommandDataTransformer::class);
    }

    public function it_supports_resource_id_aware_interface(
        ResourceIdAwareInterface $resourceIdAware
    ): void {
        $this->supportsTransformation($resourceIdAware)->shouldReturn(true);
    }

    public function it_throws_exception_when_there_isnt_id_in_request(
        ResourceIdAwareInterface $resourceIdAware,
        RequestStack $requestStack,
        Request $request
    ): void {
        $resourceIdAware->getResourceIdAttributeKey()->willReturn('id');
        $request->attributes = new ParameterBag();
        $requestStack->getCurrentRequest()->willReturn($request);

        $this->supportsTransformation($resourceIdAware)->shouldReturn(true);

        $this
            ->shouldThrow(\InvalidArgumentException::class)
            ->during('transform', [$resourceIdAware, ''])
        ;
    }

    public function it_sets_resource_id_from_request(
        ResourceIdAwareInterface $resourceIdAware,
        RequestStack $requestStack,
        Request $request
    ): void {
        $resourceIdAware->getResourceIdAttributeKey()->willReturn('id');
        $request->attributes = new ParameterBag(['id' => '1']);
        $requestStack->getCurrentRequest()->willReturn($request);

        $this->supportsTransformation($resourceIdAware)->shouldReturn(true);

        $resourceIdAware->setResourceId('1')->shouldBeCalled();

        $this->transform($resourceIdAware, '');
    }
}
