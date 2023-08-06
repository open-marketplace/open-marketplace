<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Api\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use BitBag\OpenMarketplace\Component\Core\Api\Context\VendorContextInterface;
use BitBag\OpenMarketplace\Component\Vendor\VendorAwareInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class VendorAwareEventSubscriber implements EventSubscriberInterface
{
    private VendorContextInterface $vendorContext;

    public function __construct(VendorContextInterface $vendorContext)
    {
        $this->vendorContext = $vendorContext;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::VIEW => ['setVendorFromCurrentContext', EventPriorities::PRE_VALIDATE],
        ];
    }

    public function setVendorFromCurrentContext(ViewEvent $event): void
    {
        $vendorAware = $event->getControllerResult();
        if (!$vendorAware instanceof VendorAwareInterface) {
            return;
        }

        $method = $event->getRequest()->getMethod();
        if (!in_array($method, [Request::METHOD_POST], true)) {
            return;
        }

        $vendor = $this->vendorContext->getVendor();
        if (null === $vendor) {
            return;
        }

        $vendorAware->setVendor($vendor);
    }
}
