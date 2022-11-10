<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Resolver;

use BitBag\OpenMarketplace\Entity\ShipmentInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Entity\VendorShippingMethodInterface;
use BitBag\OpenMarketplace\Repository\VendorShippingMethodRepositoryInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Shipping\Exception\UnresolvedDefaultShippingMethodException;
use Sylius\Component\Shipping\Model\ShippingMethodInterface;
use Sylius\Component\Shipping\Model\ShippingSubjectInterface;
use Sylius\Component\Shipping\Resolver\ShippingMethodsResolverInterface;
use Webmozart\Assert\Assert;

final class VendorShippingMethodsResolver implements VendorShippingMethodsResolverInterface
{
    private VendorShippingMethodRepositoryInterface $vendorShippingMethodRepository;

    public function __construct(VendorShippingMethodRepositoryInterface $vendorShippingMethodRepository)
    {
        $this->vendorShippingMethodRepository = $vendorShippingMethodRepository;
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

    public function getSupportedMethods(ShippingSubjectInterface $subject): array
    {
        /** @var ShipmentInterface $subject */
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
        /** @var VendorShippingMethodInterface $vendorShippingMethod */
        foreach ($vendorShippingMethods as $vendorShippingMethod) {
            $shippingMethods[] = $vendorShippingMethod->getShippingMethod();
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
