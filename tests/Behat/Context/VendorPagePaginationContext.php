<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context;

use Behat\Behat\Context\Context;
use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\MinkContext;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Customer;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddress;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\VendorRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Repository\CustomerRepositoryInterface;
use Sylius\Component\Product\Factory\ProductFactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

class VendorPagePaginationContext extends MinkContext implements Context
{
    private CustomerRepositoryInterface $customerRepository;

    private EntityManagerInterface $entityManager;

    private RepositoryInterface $repository;

    private VendorRepositoryInterface $vendorRepository;

    private ProductFactoryInterface $productFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        CustomerRepositoryInterface $customerRepository,
        RepositoryInterface $repository,
        VendorRepositoryInterface $vendorRepository,
        ProductFactoryInterface $productFactory
    ) {
        $this->customerRepository = $customerRepository;
        $this->entityManager = $entityManager;
        $this->repository = $repository;
        $this->vendorRepository = $vendorRepository;
        $this->productFactory = $productFactory;
    }

    /**
     * @Given there is a customer account
     */
    public function thereIsACustomerAccount()
    {
        $customer = new Customer();
        $customer->setPhoneNumber('123123123');
        $customer->setEmail('testcustomer@email.com');
        $customer->setCreatedAt(new \DateTime());
        $customer->setFirstName('John');
        $customer->setLastName('Doe');

        $this->entityManager->persist($customer);
        $this->entityManager->flush();
    }

    /**
     * @Given there is a vendor
     */
    public function thereIsAVendor()
    {
        $customer = $this->customerRepository
            ->findOneBy(['email' => 'testcustomer@email.com']);

        $country = $this->repository->findOneBy(['code' => 'US']);

        $vendorAddress = new VendorAddress();
        $vendorAddress->setCity('test');
        $vendorAddress->setCountry($country);
        $vendorAddress->setPostalCode('test');
        $vendorAddress->setStreet('test');

        $vendor = new Vendor();
        $vendor->setSlug('test-company');
        $vendor->setDescription('test-company');
        $vendor->setCompanyName('test company');
        $vendor->setCustomer($customer);
        $vendor->setPhoneNumber('123123123');
        $vendor->setTaxIdentifier('123123123');
        $vendor->setVendorAddress($vendorAddress);

        $this->entityManager->persist($vendorAddress);
        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
    }

    /**
     * @Given the vendor has :number products
     */
    public function theVendorHasMoreThanOnePageOfProducts(int $number)
    {
        $vendor = $this->vendorRepository->findOneBy(['slug' => 'test-company']);

        for ($i=0; $i<$number; $i++) {
            $product = $this->productFactory->createNew();
            $product->setCode(sprintf('code-%s', $i));
            $product->setVendor($vendor);

            $this->entityManager->persist($product);
        }
        $this->entityManager->flush();
    }

    /**
     * @return DocumentElement
     */
    private function getPage()
    {
        return $this->getSession()->getPage();
    }
}
