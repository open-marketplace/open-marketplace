<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Vendor\EventListener;

use BitBag\OpenMarketplace\Component\Vendor\VendorContextInterface;
use BitBag\OpenMarketplace\Exception\ShopUserHasNoVendorContextException;
use BitBag\OpenMarketplace\Exception\ShopUserNotFoundException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Routing\RouterInterface;

class AccessDeniedListener implements EventSubscriberInterface
{
    public function __construct(
        private VendorContextInterface $vendorProvider,
        private RequestStack $requestStack,
        private RouterInterface $router
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::EXCEPTION => ['onKernelException', 2],
        ];
    }

    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        if (!$exception instanceof AccessDeniedHttpException) {
            return;
        }

        /** @var Request $currentRequest */
        $currentRequest = $this->requestStack->getCurrentRequest();

        $uriParts = explode('/', $currentRequest->getRequestUri());
        if ('' === $uriParts[0]) {
            array_shift($uriParts);
        }

        if (4 > count($uriParts)) {
            return;
        }

        if ('account' !== $uriParts[1] || 'vendor' !== $uriParts[2] || 'conversations' === $uriParts[3]) {
            return;
        }

        try {
            $currentVendor = $this->vendorProvider->getVendor();
            if (false === $currentVendor->isEnabled()) {
                $event->setResponse(new RedirectResponse(
                    $this->router->generate('open_marketplace_vendor_conversation_index')
                ));
                $event->stopPropagation();
            }
        } catch (ShopUserHasNoVendorContextException|ShopUserNotFoundException $e) {
        }
    }
}
