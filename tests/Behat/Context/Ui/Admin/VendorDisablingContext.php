<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Ui\Admin;

use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\RawMinkContext;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;

final class VendorDisablingContext extends RawMinkContext
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private ExampleFactoryInterface $vendorExampleFactory,
    ) {
    }

    /**
     * @Given There is a :ifEnabled vendor
     */
    public function thereIsAVendor($ifEnabled): void
    {
        $flag = 'enabled' == $ifEnabled ? true : false;

        $options = [
            'company_name' => 'vendor',
            'phone_number' => 'vendorPhone',
            'tax_identifier' => 'vendorTax',
            'slug' => 'slug',
            'description' => 'description',
            'enabled' => $flag,
        ];

        $vendor = $this->vendorExampleFactory->create($options);

        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
    }

    /**
     * @When I click :buttonText
     */
    public function iClick(string $buttonText): void
    {
        $this->getPage()->pressButton($buttonText);
    }

    private function getPage(): DocumentElement
    {
        return $this->getSession()->getPage();
    }
}
