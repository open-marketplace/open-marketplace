<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Setup;

use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Factory\DraftAttributeFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;

final class DraftAttributeContext extends RawMinkContext
{
    public function __construct(
        private DraftAttributeFactoryInterface $draftAttributeFactory,
        private EntityManagerInterface $entityManager,
        private SharedStorageInterface $sharedStorage
    ) {
    }

    /**
     * @Given there is draft attribute with code :arg1 and type :arg2
     */
    public function thereIsProductAttributeWithCodeAndType(string $code, string $type): void
    {
        $vendor = $this->sharedStorage->get('vendor');
        $draftAttribute = $this->draftAttributeFactory->createTyped($type, $vendor);
        $draftAttribute->setCode($code);

        $this->sharedStorage->set(sprintf('draft_attribute_%s', $code), $draftAttribute);
        $this->entityManager->persist($draftAttribute);

        $this->entityManager->flush();
    }
}
