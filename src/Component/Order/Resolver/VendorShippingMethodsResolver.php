<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Order\Resolver;

use BitBag\OpenMarketplace\Component\Order\Entity\ShipmentInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorShippingMethodInterface;
use BitBag\OpenMarketplace\Component\Vendor\Repository\VendorShippingMethodRepositoryInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Shipping\Exception\UnresolvedDefaultShippingMethodException;
use Sylius\Component\Shipping\Model\ShippingMethodInterface;
use Sylius\Component\Shipping\Model\ShippingSubjectInterface;
use Webmozart\Assert\Assert;

final class VendorShippingMethodsResolver implements VendorShippingMethodsResolverInterface
{
    public function __construct(
        private VendorShippingMethodRepositoryInterface $vendorShippingMethodRepository
    ) {
    }

    public function getDefaultShippingMethod(
        VendorInterface $vendor,
        ?ChannelInterface $channel
    ): VendorShippingMethodInterface {
        if (null === $channel) {
            throw new UnresolvedDefaultShippingMethodException();
        }

        $shippingMethods = $this->vendorShippingMethodRepository->findEnabledForChannel($vendor, $channel);
        if (empty($shippingMethods)) {
            throw new UnresolvedDefaultShippingMethodException();
        }

        return $shippingMethods[0];
    }

    /**
     * @param ShipmentInterface $subject
     */
    public function getSupportedMethods(ShippingSubjectInterface $subject): array
    {
        Assert::isInstanceOf($subject, ShipmentInterface::class);
        Assert::true($this->supports($subject));

        /** @var VendorInterface $vendor */
        $vendor = $subject->getVendor();
        /** @var ChannelInterface $channel */
        $channel = $subject->getOrder()?->getChannel();

        $vendorShippingMethods = $this
            ->vendorShippingMethodRepository
            ->findEnabledForChannel($vendor, $channel)
        ;

        $shippingMethods = [];
        /** @var ShippingMethodInterface $vendorShippingMethod */
        foreach ($vendorShippingMethods as $vendorShippingMethod) {
            /** @var ShippingMethodInterface $shippingMethod */
            $shippingMethod = $vendorShippingMethod->getShippingMethod();
            $shippingMethods[] = $shippingMethod;
        }

        return $shippingMethods;
    }

    public function supports(ShippingSubjectInterface $subject): bool
    {
        return $subject instanceof ShipmentInterface &&
            $subject->hasVendor() &&
            null !== $subject->getOrder() &&
            null !== $subject->getOrder()->getChannel();
    }
}
