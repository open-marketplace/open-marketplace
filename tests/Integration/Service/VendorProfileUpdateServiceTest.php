<?php

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Integration\Service;

use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Nelmio\Alice\Loader\NativeLoader;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VendorProfileUpdateServiceTest extends WebTestCase
{
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    public function test_phpUnitWorksFine()
    {
        self::bootKernel();
        
        $loader = new NativeLoader();
        $manager = self::$kernel->getContainer()->get('doctrine')->getManager();
        $fixtures = $loader->loadFile(__DIR__.'/../DataFixtures/ORM/vendor_fixtures.yml')->getObjects();
        foreach ($fixtures as $fixture){
            $manager->persist($fixture);
            $manager->flush();
        }      
        dd($fixtures);
    }   
    public function tearDown(): void
    {
//        self::bootKernel();
        $purger = new ORMPurger(self::$kernel->getContainer()->get('doctrine')->getManager());
        $purger->purge();        
    }
//    public function test_it_loads_fixtures()
//    {
////        $this->loadFixturesFromFile();
//    }
}
