<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\EventSubscriber;

use BitBag\OpenMarketplace\Api\EventSubscriber\VendorSlugEventSubscriber;
use BitBag\OpenMarketplace\Api\Messenger\Command\VendorSlugAwareInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Generator\SlugGeneratorInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;

final class VendorSlugEventSubscriberSpec extends ObjectBehavior
{
    public function let(
        SlugGeneratorInterface $vendorSlugGenerator
    ): void {
        $this->beConstructedWith($vendorSlugGenerator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(VendorSlugEventSubscriber::class);
        $this->shouldImplement(EventSubscriberInterface::class);
    }

    public function it_generates_slug_for_vendor_with_company_name_and_empty_slug(
        SlugGeneratorInterface $vendorSlugGenerator,
        VendorInterface $vendor,
        HttpKernelInterface $kernel,
        Request $request,
        ): void {
        $request->getMethod()->willReturn(Request::METHOD_POST);

        $vendor->getCompanyName()->willReturn('Wayne Enterprises');
        $vendor->getSlug()->willReturn(null);

        $vendorSlugGenerator->generateSlug('Wayne Enterprises')->willReturn('Wayne-Enterprises');

        $vendor->setSlug('Wayne-Enterprises')->shouldBeCalled();

        $this->generateSlug(new ViewEvent(
            $kernel->getWrappedObject(),
            $request->getWrappedObject(),
            HttpKernelInterface::MAIN_REQUEST,
            $vendor->getWrappedObject(),
        ));
    }

    public function it_generates_slug_for_vendor_slug_aware_with_company_name_and_empty_slug(
        SlugGeneratorInterface $vendorSlugGenerator,
        VendorSlugAwareInterface $vendorSlugAware,
        HttpKernelInterface $kernel,
        Request $request,
        ): void {
        $request->getMethod()->willReturn(Request::METHOD_POST);

        $vendorSlugAware->getCompanyName()->willReturn('Wayne Enterprises');
        $vendorSlugAware->getSlug()->willReturn(null);

        $vendorSlugGenerator->generateSlug('Wayne Enterprises')->willReturn('Wayne-Enterprises');

        $vendorSlugAware->setSlug('Wayne-Enterprises')->shouldBeCalled();

        $this->generateSlug(new ViewEvent(
            $kernel->getWrappedObject(),
            $request->getWrappedObject(),
            HttpKernelInterface::MAIN_REQUEST,
            $vendorSlugAware->getWrappedObject(),
        ));
    }

    public function it_generates_new_slug_for_vendor_with_slug_and_company_name(
        SlugGeneratorInterface $vendorSlugGenerator,
        VendorInterface $vendor,
        HttpKernelInterface $kernel,
        Request $request,
        ): void {
        $request->getMethod()->willReturn(Request::METHOD_POST);

        $vendor->getCompanyName()->willReturn('Wayne Enterprises');
        $vendor->getSlug()->willReturn('Prev-Slug');

        $vendorSlugGenerator->generateSlug('Wayne Enterprises')->willReturn('Wayne-Enterprises');

        $vendor->setSlug('Wayne-Enterprises')->shouldBeCalled();

        $this->generateSlug(new ViewEvent(
            $kernel->getWrappedObject(),
            $request->getWrappedObject(),
            HttpKernelInterface::MAIN_REQUEST,
            $vendor->getWrappedObject(),
        ));
    }

    public function it_does_nothing_if_the_vendor_has_no_company_name(
        SlugGeneratorInterface $vendorSlugGenerator,
        VendorSlugAwareInterface $vendor,
        HttpKernelInterface $kernel,
        Request $request,
        ): void {
        $request->getMethod()->willReturn(Request::METHOD_POST);

        $vendor->getCompanyName()->willReturn(null);

        $vendorSlugGenerator->generateSlug(Argument::any())->shouldNotBeCalled();
        $vendor->setSlug(Argument::any())->shouldNotBeCalled();

        $this->generateSlug(new ViewEvent(
            $kernel->getWrappedObject(),
            $request->getWrappedObject(),
            HttpKernelInterface::MAIN_REQUEST,
            $vendor->getWrappedObject(),
        ));
    }

    public function it_does_nothing_if_the_vendor_has_empty_company_name(
        SlugGeneratorInterface $vendorSlugGenerator,
        VendorSlugAwareInterface $vendor,
        HttpKernelInterface $kernel,
        Request $request,
        ): void {
        $request->getMethod()->willReturn(Request::METHOD_POST);

        $vendor->getCompanyName()->willReturn('');

        $vendorSlugGenerator->generateSlug(Argument::any())->shouldNotBeCalled();
        $vendor->setSlug(Argument::any())->shouldNotBeCalled();

        $this->generateSlug(new ViewEvent(
            $kernel->getWrappedObject(),
            $request->getWrappedObject(),
            HttpKernelInterface::MAIN_REQUEST,
            $vendor->getWrappedObject(),
        ));
    }
}
