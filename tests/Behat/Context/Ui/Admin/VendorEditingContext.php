<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Ui\Admin;

use Behat\MinkExtension\Context\RawMinkContext;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;

final class VendorEditingContext extends RawMinkContext
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private ExampleFactoryInterface $vendorExampleFactory
    ) {
    }

    /**
     * @Given There is a :ifVerified Vendor who :ifRequested change
     */
    public function thereIsAVendorWhoChange($ifVerified, $ifRequested): void
    {
        $options = [
            'company_name' => 'vendor',
            'phone_number' => 'vendorPhone',
            'tax_identifier' => 'vendorTax',
            'slug' => 'slug',
            'description' => 'description',
            'status' => $ifVerified,
        ];

        $vendor = $this->vendorExampleFactory->create($options);

        if ('requested' === $ifRequested) {
            $vendor->setEditedAt(new DateTime());
        }

        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
    }
}
