<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\RawMinkContext;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Webmozart\Assert\Assert;

final class VendorDisablingContext extends RawMinkContext implements Context
{
    private EntityManagerInterface $entityManager;

    private ExampleFactoryInterface $vendorExampleFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        ExampleFactoryInterface $vendorExampleFactory,
    ) {
        $this->entityManager = $entityManager;
        $this->vendorExampleFactory = $vendorExampleFactory;
    }

    /**
     * @Given There is a :ifEnabled vendor
     */
    public function thereIsAVendor($ifEnabled)
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
    public function iClick($buttonText)
    {
        $this->getPage()->pressButton($buttonText);
    }

    /**
     * @When I choose :element
     */
    public function iChoose($element)
    {
        $page = $this->getSession()->getPage();
        $findName = $page->find('css', $element);
        if (!$findName) {
            throw new Exception($element . ' could not be found');
        }
        $findName->click();
    }

    /**
     * @Then I should not see :ifEnabled button
     */
    public function iShouldNotSeeButton($ifEnabled)
    {
        $element = '#' . strtolower($ifEnabled);
        $page = $this->getSession()->getPage();
        $findName = $page->find('css', $element);
        Assert::null($findName);
    }

    /**
     * @return DocumentElement
     */
    private function getPage()
    {
        return $this->getSession()->getPage();
    }
}
