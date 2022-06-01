<?php

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

final class VendorBlockingContext extends RawMinkContext implements Context
{
    private EntityManagerInterface $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager
    ){
        $this->entityManager = $entityManager;
    }

    /**
     * @Given There is a :ifBlocked vendor
     */
    public function thereIsAVendor($ifBlocked)
    {
        $vendor = new Vendor();
        $vendor->setCompanyName('vendor');
        $vendor->setTaxIdentifier('vendorTax');
        $vendor->setPhoneNumber('vendorPhone');
        $vendor->setBlocked($ifBlocked);
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
        $findName = $page->find("css", $element);
        if (!$findName) {
            throw new Exception($element . " could not be found");
        } else {
            $findName->click();
            sleep(10);
        }
    }

    /**
     * @return DocumentElement
     */
    private function getPage()
    {
        return $this->getSession()->getPage();
    }

}
