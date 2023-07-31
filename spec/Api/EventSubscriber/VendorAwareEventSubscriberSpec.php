<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\EventSubscriber;

use BitBag\OpenMarketplace\Api\Context\VendorContextInterface;
use BitBag\OpenMarketplace\Api\EventSubscriber\VendorAwareEventSubscriber;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\VendorAwareInterface;
use PhpSpec\ObjectBehavior;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;

final class VendorAwareEventSubscriberSpec extends ObjectBehavior
{
    public function let(
        VendorContextInterface $vendorContext,
    ): void {
        $this->beConstructedWith($vendorContext);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorAwareEventSubscriber::class);
    }

    public function it_does_nothing_when_current_resource_is_not_a_vendor_aware(
        VendorContextInterface $vendorContext,
        VendorInterface $vendor,
        VendorAwareInterface $resource,
        HttpKernelInterface $kernel,
        Request $request,
        ): void {
        $vendorContext->getVendor()->shouldNotBeCalled();
        $resource->setVendor($vendor)->shouldNotBeCalled();

        $this->setVendorFromCurrentContext(new ViewEvent(
            $kernel->getWrappedObject(),
            $request->getWrappedObject(),
            HttpKernelInterface::MAIN_REQUEST,
            $vendor->getWrappedObject(),
        ));
    }

    public function it_does_nothing_when_request_method_is_different_than_post(
        VendorContextInterface $vendorContext,
        VendorInterface $vendor,
        VendorAwareInterface $resource,
        HttpKernelInterface $kernel,
        Request $request,
        ): void {
        $request->getMethod()->willReturn(Request::METHOD_GET);
        $vendorContext->getVendor()->willReturn($vendor);
        $resource->setVendor($vendor)->shouldNotBeCalled();

        $this->setVendorFromCurrentContext(new ViewEvent(
            $kernel->getWrappedObject(),
            $request->getWrappedObject(),
            HttpKernelInterface::MAIN_REQUEST,
            $resource->getWrappedObject(),
        ));
    }

    public function it_does_nothing_when_current_user_is_not_vendor_context(
        VendorContextInterface $vendorContext,
        VendorInterface $vendor,
        VendorAwareInterface $resource,
        HttpKernelInterface $kernel,
        Request $request,
        ): void {
        $request->getMethod()->willReturn(Request::METHOD_POST);
        $vendorContext->getVendor()->willReturn(null);
        $resource->setVendor($vendor)->shouldNotBeCalled();

        $this->setVendorFromCurrentContext(new ViewEvent(
            $kernel->getWrappedObject(),
            $request->getWrappedObject(),
            HttpKernelInterface::MAIN_REQUEST,
            $resource->getWrappedObject(),
        ));
    }

    public function it_set_vendor_from_current_context(
        VendorContextInterface $vendorContext,
        VendorInterface $vendor,
        VendorAwareInterface $resource,
        HttpKernelInterface $kernel,
        Request $request
    ): void {
        $request->getMethod()->willReturn(Request::METHOD_POST);
        $vendorContext->getVendor()->willReturn($vendor);

        $vendorContext->getVendor()->shouldBeCalled();
        $resource->setVendor($vendor)->shouldBeCalled();

        $this->setVendorFromCurrentContext(new ViewEvent(
            $kernel->getWrappedObject(),
            $request->getWrappedObject(),
            HttpKernelInterface::MAIN_REQUEST,
            $resource->getWrappedObject(),
        ));
    }
}
