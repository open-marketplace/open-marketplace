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
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class VendorVerificationContext extends RawMinkContext
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private FactoryInterface $countryFactory,
        private ExampleFactoryInterface $vendorExampleFactory,
        ) {
    }

    /**
     * @Given There is an unverified Vendor
     */
    public function thereIsAnUnverifiedVendor(): void
    {
        $vendorCountry = $this->countryFactory->createNew();
        $vendorCountry->setCode('US');
        $this->entityManager->persist($vendorCountry);

        $options = [
            'company_name' => 'vendor',
            'phone_number' => 'vendorPhone',
            'tax_identifier' => 'vendorTax',
            'street' => 'vendorStreet',
            'city' => 'vendorCity',
            'postcode' => 'vendorCode',
            'slug' => 'slug',
            'description' => 'description',
            'country' => $vendorCountry,
            'status' => 'unverified',
        ];

        $vendor = $this->vendorExampleFactory->create($options);

        $this->entityManager->persist($vendorCountry);
        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
    }

    /**
     * @When I click :buttonText
     */
    public function iClick(string $buttonText): void
    {
        $this->getSession()->getPage()->pressButton($buttonText);
        sleep(1);
    }
}
