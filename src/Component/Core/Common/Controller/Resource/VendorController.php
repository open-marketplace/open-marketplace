<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Common\Controller\Resource;

use BitBag\OpenMarketplace\Entity\Vendor;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Entity\VendorProfileUpdate;
use BitBag\OpenMarketplace\Exception\ShopUserNotFoundException;
use BitBag\OpenMarketplace\Provider\VendorProviderInterface;
use BitBag\OpenMarketplace\Updater\VendorProfileUpdaterInterface;
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
use Sylius\Component\Resource\Exception\UpdateHandlingException;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Metadata\MetadataInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Sylius\Component\Resource\ResourceActions;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\TokenNotFoundException;

final class VendorController extends ResourceController
{
    public function __construct(
        protected MetadataInterface $metadata,
        protected RequestConfigurationFactoryInterface $requestConfigurationFactory,
        protected ?ViewHandlerInterface $viewHandler,
        protected RepositoryInterface $repository,
        protected FactoryInterface $factory,
        protected NewResourceFactoryInterface $newResourceFactory,
        protected ObjectManager $manager,
        protected SingleResourceProviderInterface $singleResourceProvider,
        protected ResourcesCollectionProviderInterface $resourcesFinder,
        protected ResourceFormFactoryInterface $resourceFormFactory,
        protected RedirectHandlerInterface $redirectHandler,
        protected FlashHelperInterface $flashHelper,
        protected AuthorizationCheckerInterface $authorizationChecker,
        protected EventDispatcherInterface $eventDispatcher,
        protected ?StateMachineInterface $stateMachine,
        protected ResourceUpdateHandlerInterface $resourceUpdateHandler,
        protected ResourceDeleteHandlerInterface $resourceDeleteHandler,
        protected VendorProviderInterface $vendorProvider,
        protected VendorProfileUpdaterInterface $vendorProfileUpdater
    ) {
        parent::__construct(
            $metadata,
            $requestConfigurationFactory,
            $viewHandler,
            $repository,
            $factory,
            $newResourceFactory,
            $manager,
            $singleResourceProvider,
            $resourcesFinder,
            $resourceFormFactory,
            $redirectHandler,
            $flashHelper,
            $authorizationChecker,
            $eventDispatcher,
            $stateMachine,
            $resourceUpdateHandler,
            $resourceDeleteHandler
        );
    }

    public function createAction(Request $request): Response
    {
        try {
            return parent::createAction($request);
        } catch (ShopUserNotFoundException $exception) {
            return $this->redirectToRoute('sylius_shop_login');
        } catch (TokenNotFoundException $exception) {
            return $this->redirectToRoute('sylius_shop_login');
        }
    }

    public function customUpdateAction(Request $request): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);
        $this->isGrantedOr403($configuration, ResourceActions::UPDATE);

        $vendor = $this->vendorProvider->provideCurrentVendor();
        $pendingUpdate = $this->manager->getRepository(VendorProfileUpdate::class)
            ->findOneBy(['vendor' => $vendor]);

        if (null !== $pendingUpdate) {
            $this->addFlash('error', 'sylius.user.verify_email_request');

            return $this->redirectToRoute('vendor_profile');
        }

        $resource = $vendor;

        $form = $this->resourceFormFactory->create($configuration, $resource);

        $form->handleRequest($request);
        if (
            in_array($request->getMethod(), ['POST', 'PUT', 'PATCH'], true)
            && $form->isSubmitted()
            && $form->isValid()
        ) {
            $resource = $form->getData();

            try {
                $image = $resource->getImage();
                $backgroundImage = $resource->getBackgroundImage();
                $this->vendorProfileUpdater->createPendingVendorProfileUpdate(
                    $form->getData(),
                    $vendor,
                    $image,
                    $backgroundImage
                );
                if ($image) {
                    $this->manager->remove($image);
                }
                if ($backgroundImage) {
                    $this->manager->remove($backgroundImage);
                }

                $vendor->setEditedAt(new \DateTime());
                $this->manager->flush();
            } catch (UpdateHandlingException $exception) {
                if (!$configuration->isHtmlRequest()) {
                    return $this->createRestView($configuration, $form, $exception->getApiResponseCode());
                }

                $this->flashHelper->addErrorFlash($configuration, $exception->getFlash());

                return $this->redirectHandler->redirectToReferer($configuration);
            }

            if ($configuration->isHtmlRequest()) {
                $this->flashHelper->addSuccessFlash($configuration, ResourceActions::UPDATE, $resource);
            }

            if (!$configuration->isHtmlRequest()) {
                if ($configuration->getParameters()->get('return_content', false)) {
                    return $this->createRestView($configuration, $resource, Response::HTTP_OK);
                }

                return $this->createRestView($configuration, null, Response::HTTP_NO_CONTENT);
            }

            return $this->redirectHandler->redirectToResource($configuration, $resource);
        }

        if (!$configuration->isHtmlRequest()) {
            return $this->createRestView($configuration, $form, Response::HTTP_BAD_REQUEST);
        }

        return $this->render($configuration->getTemplate(ResourceActions::UPDATE . '.html'), [
            'configuration' => $configuration,
            'metadata' => $this->metadata,
            'resource' => $resource,
            $this->metadata->getName() => $resource,
            'form' => $form->createView(),
        ]);
    }

    public function showAction(Request $request): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);

        $this->isGrantedOr403($configuration, ResourceActions::SHOW);

        /** @var ResourceInterface $resource */
        $resource = $this->vendorProvider->provideCurrentVendor();
        $this->eventDispatcher->dispatch(ResourceActions::SHOW, $configuration, $resource);

        if ($configuration->isHtmlRequest()) {
            return $this->render($configuration->getTemplate(ResourceActions::SHOW . '.html'), [
                'configuration' => $configuration,
                'metadata' => $this->metadata,
                'resource' => $resource,
                $this->metadata->getName() => $resource,
            ]);
        }

        return $this->createRestView($configuration, $resource);
    }

    public function verifyVendorAction(Request $request): Response
    {
        $vendorId = $request->attributes->get('id', 0);
        $vendorRepository = $this->manager->getRepository(Vendor::class);

        $currentVendor = $vendorRepository->findOneBy(['id' => $vendorId]);

        if (null === $currentVendor) {
            throw new NotFoundHttpException(sprintf('Vendor with id %d has not been found', $vendorId));
        }

        $currentVendor->setStatus(VendorInterface::STATUS_VERIFIED);

        $this->manager->flush();

        $this->addFlash('success', 'open_marketplace.ui.vendor_verified');

        return $this->redirectToRoute('open_marketplace_admin_vendor_index');
    }

    public function enablingVendorAction(Request $request): Response
    {
        $vendorId = $request->attributes->get('id', 0);
        $vendorRepository = $this->manager->getRepository(Vendor::class);
        $currentVendor = $vendorRepository->findOneBy(['id' => $vendorId]);
        if ($currentVendor) {
            $currentVendor->setEnabled(!$currentVendor->isEnabled());
            $messageSuffix = $currentVendor->isEnabled() ? 'enabled' : 'disabled';

            $this->manager->flush();
            $this->addFlash('success', 'open_marketplace.ui.vendor_' . $messageSuffix);
        }

        return $this->redirectToRoute('open_marketplace_admin_vendor_index');
    }
}
