<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Sender;

use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Psr\Log\LoggerInterface;
use Sylius\Component\Mailer\Sender\SenderInterface;

final class SettlementsCreatedEmailSender implements SettlementsCreatedEmailSenderInterface
{
    private const EMAIL_TEMPLATE = 'settlements_created';

    public function __construct(
        private SenderInterface $sender,
        private LoggerInterface $logger,
    ) {
    }

    public function send(VendorInterface $vendor, array $settlements): void
    {
        $shopUser = $vendor->getShopUser();

        try {
            /**
             * Deprecated:
             * using this method without 2 last arguments ($ccRecipients and $bccRecipients)
             * is deprecated since 1.8 and won't be possible since 2.0
             *
             * We don't need to define these arguments as for now but we will have to provide them in the future.
             * We can ignore checking this line and remove it when method signature changes.
             */
            /**
             * @phpstan-ignore-next-line
             */
            $this->sender->send(
                self::EMAIL_TEMPLATE,
                [$shopUser->getEmail()],
                [
                    'settlements' => $this->mapSettlements($settlements),
                ],
                [],
                [],
                [],
                [],
            );
        } catch (\Exception $exception) {
            $this->logger->error(
                sprintf(
                    'An exception occurred while sending settlement created email for vendor with id %s: %s',
                    $vendor->getId(),
                    $exception->getMessage()
                )
            );
        }
    }

    private function mapSettlements(array $settlements): array
    {
        return array_map(
            fn (SettlementInterface $settlement) => [
                'startDate' => $settlement->getStartDate(),
                'endDate' => $settlement->getEndDate(),
                'commissionTotal' => $settlement->getTotalCommissionAmount(),
                'channelName' => $settlement->getChannel()->getName(),
            ],
            $settlements
        );
    }
}
