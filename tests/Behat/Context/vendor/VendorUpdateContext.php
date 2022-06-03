<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context\vendor;

use Behat\MinkExtension\Context\MinkContext;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddress;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdate;
use Doctrine\Persistence\ObjectManager;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Component\Addressing\Model\Country;
use Sylius\Component\User\Repository\UserRepositoryInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use function PHPUnit\Framework\assertNotEquals;

class VendorUpdateContext extends MinkContext
{
    private SharedStorageInterface $sharedStorage;
    private UserRepositoryInterface $userRepository;
    private ExampleFactoryInterface $userFactory;
    private ObjectManager $manager;
    private MessageBusInterface $messageBus; 

    public function __construct(
        SharedStorageInterface $sharedStorage,
        UserRepositoryInterface $userRepository,
        ExampleFactoryInterface $userFactory,
        ObjectManager $manager,
        MessageBusInterface $messageBus        
    ) {

        $this->sharedStorage = $sharedStorage;
        $this->userRepository = $userRepository;
        $this->userFactory = $userFactory;
        $this->manager = $manager;
        $this->messageBus = $messageBus;       
    }

    /**
     * @Given there is a vendor user :vendor_user_email registered in :country_code
     */
    public function thereIsAVendorUserRegisteredIn($vendor_user_email, $country_code)
    {
        $user = $this->userFactory->create(['email' => $vendor_user_email, 'password' => 'password', 'enabled' => true]);

        $this->sharedStorage->set('user', $user);

        $this->userRepository->add($user);
        $customer = $this->sharedStorage->get('user')->getCustomer();
        $country = $this->manager->getRepository(Country::class)->findOneBy(['code'=>$country_code]);
        $vendor = new Vendor();
        $vendor->setCompanyName("sdasdsa");
        $vendor->setCustomer($customer);
        $vendor->setPhoneNumber("333333333");
        $vendor->setTaxIdentifier('543455');
        $vendor->setVendorAddress(new VendorAddress());
        $vendor->getVendorAddress()->setCountry($country);
        $vendor->getVendorAddress()->setCity('Warsaw');
        $vendor->getVendorAddress()->setPostalCode('00-111');
        $vendor->getVendorAddress()->setStreet('Tajna 13');
        $this->manager->persist($vendor);
        $this->manager->flush();
        $this->sharedStorage->set('vendor',$vendor);        
    }
    
    /**
     * @Then Pending update data should appear in database
     */
    public function pendingUpdateDataShouldAppearInDatabase()
    {
        $vendor = $this->sharedStorage->get('vendor');
        $pendingData = $this->manager->getRepository(VendorProfileUpdate::class)->findOneBy(['vendor'=>$vendor]);
        
        assertNotEquals(null, $pendingData);
    }

}
