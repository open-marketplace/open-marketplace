<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Settlement\Sender;

use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use BitBag\OpenMarketplace\Component\Settlement\Sender\SettlementsCreatedEmailSender;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use PhpSpec\ObjectBehavior;
use Psr\Log\LoggerInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Mailer\Sender\SenderInterface;

final class SettlementsCreatedEmailSenderSpec extends ObjectBehavior
{
    public function let(
        SenderInterface $sender,
        LoggerInterface $logger,
    ): void {
        $this->beConstructedWith(
            $sender,
            $logger,
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(SettlementsCreatedEmailSender::class);
    }

    public function it_sends_email(
        VendorInterface $vendor,
        SettlementInterface $settlement,
        ShopUserInterface $shopUser,
        ChannelInterface $channel,
    ): void {
        $settlements = [$settlement->getWrappedObject()];
        $vendor->getShopUser()->willReturn($shopUser);
        $shopUser->getEmail()->willReturn('email@domain.com');
        $settlement->getStartDate()->willReturn(new \DateTime('-1 month'));
        $settlement->getEndDate()->willReturn(new \DateTime());
        $settlement->getTotalCommissionAmount()->willReturn(1000);
        $settlement->getChannel()->willReturn($channel);

        $channel->getName()->willReturn('Open Marketplace');

        $this->send($vendor, $settlements);
    }
}
