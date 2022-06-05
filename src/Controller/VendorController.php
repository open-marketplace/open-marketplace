<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdate;
use BitBag\SyliusMultiVendorMarketplacePlugin\Exception\UserNotFoundException;
use BitBag\SyliusMultiVendorMarketplacePlugin\Service\VendorProvider;
use Doctrine\Persistence\ObjectManager;
use Sylius\Bundle\ResourceBundle\Controller\AuthorizationCheckerInterface;
use Sylius\Bundle\ResourceBundle\Controller\EventDispatcherInterface;
use Sylius\Bundle\ResourceBundle\Controller\FlashHelperInterface;
use Sylius\Bundle\ResourceBundle\Controller\NewResourceFactoryInterface;
use Sylius\Bundle\ResourceBundle\Controller\RedirectHandlerInterface;
use Sylius\Bundle\ResourceBundle\Controller\RequestConfigurationFactoryInterface;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Sylius\Bundle\ResourceBundle\Controller\ResourceDeleteHandlerInterface;
use Sylius\Bundle\ResourceBundle\Controller\ResourceFormFactoryInterface;
use Sylius\Bundle\ResourceBundle\Controller\ResourcesCollectionProviderInterface;
use Sylius\Bundle\ResourceBundle\Controller\ResourceUpdateHandlerInterface;
use Sylius\Bundle\ResourceBundle\Controller\SingleResourceProviderInterface;
use Sylius\Bundle\ResourceBundle\Controller\StateMachineInterface;
use Sylius\Bundle\ResourceBundle\Controller\ViewHandlerInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Metadata\MetadataInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\TokenNotFoundException;

class VendorController extends ResourceController
{
    private VendorProvider $vendorProvider;

    public function __construct(MetadataInterface $metadata, RequestConfigurationFactoryInterface $requestConfigurationFactory, ?ViewHandlerInterface $viewHandler, RepositoryInterface $repository, FactoryInterface $factory, NewResourceFactoryInterface $newResourceFactory, ObjectManager $manager, SingleResourceProviderInterface $singleResourceProvider, ResourcesCollectionProviderInterface $resourcesFinder, ResourceFormFactoryInterface $resourceFormFactory, RedirectHandlerInterface $redirectHandler, FlashHelperInterface $flashHelper, AuthorizationCheckerInterface $authorizationChecker, EventDispatcherInterface $eventDispatcher, ?StateMachineInterface $stateMachine, ResourceUpdateHandlerInterface $resourceUpdateHandler, ResourceDeleteHandlerInterface $resourceDeleteHandler, VendorProvider $vendorProvider)
    {
        parent::__construct($metadata, $requestConfigurationFactory, $viewHandler, $repository, $factory, $newResourceFactory, $manager, $singleResourceProvider, $resourcesFinder, $resourceFormFactory, $redirectHandler, $flashHelper, $authorizationChecker, $eventDispatcher, $stateMachine, $resourceUpdateHandler, $resourceDeleteHandler);
        $this->vendorProvider = $vendorProvider;
    }

    public function createAction(Request $request): Response
    {
        try {
            return parent::createAction($request);
        } catch (UserNotFoundException $exception) {
            return $this->redirectToRoute('sylius_shop_login');
        } catch (TokenNotFoundException $exception) {
            return $this->redirectToRoute('sylius_shop_login');
        }
    }

    public function updateAction(Request $request): Response
    {       
//        /** @var ShopUser $user */
//        $user = $this->getUser();
//        /** @var Customer $customer */
//        $customer = $user->getCustomer();
//        $vendor = $customer->getVendor();
        $vendor = $this->vendorProvider->getLoggedVendor();
        $pendingUpdate = $this->manager->getRepository(VendorProfileUpdate::class)->findOneBy(['vendor' => $vendor]);
        if (null == $pendingUpdate) {
            return parent::updateAction($request);
        }        
        $this->addFlash('error', 'sylius.user.verify_email_request');

        return $this->redirectToRoute('vendor_profile');
    }
}
