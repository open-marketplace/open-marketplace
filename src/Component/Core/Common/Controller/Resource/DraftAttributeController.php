<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Common\Controller\Resource;

use BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Factory\DraftAttributeFactoryInterface;
use BitBag\OpenMarketplace\Form\ProductListing\DraftAttributeChoiceType;
use BitBag\OpenMarketplace\Provider\VendorProviderInterface;
use BitBag\OpenMarketplace\Security\Voter\ObjectOwningVoter;
use BitBag\OpenMarketplace\Updater\ProductAttributeUpdaterInterface;
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
use Sylius\Bundle\ResourceBundle\Event\ResourceControllerEvent;
use Sylius\Bundle\ResourceBundle\Form\Registry\FormTypeRegistry;
use Sylius\Component\Attribute\Model\AttributeInterface;
use Sylius\Component\Registry\ServiceRegistryInterface;
use Sylius\Component\Resource\Exception\UpdateHandlingException;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Metadata\MetadataInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Sylius\Component\Resource\ResourceActions;
use Sylius\Component\Resource\Translation\Provider\TranslationLocaleProviderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;

final class DraftAttributeController extends ResourceController
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
        private DraftAttributeFactoryInterface $draftAttributeFactory,
        private ProductAttributeUpdaterInterface $productAttributeUpdater,
        private VendorProviderInterface $vendorProvider
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

    public function updateAction(Request $request): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);

        $this->isGrantedOr403($configuration, ResourceActions::UPDATE);
        $resource = $this->findOr404($configuration);
        $this->denyAccessUnlessGranted(ObjectOwningVoter::OWNIT, $resource);

        $form = $this->resourceFormFactory->create($configuration, $resource);

        $form->handleRequest($request);
        if (
            in_array($request->getMethod(), ['POST', 'PUT', 'PATCH'], true)
            && $form->isSubmitted()
            && $form->isValid()
        ) {
            $resource = $form->getData();
            $productAttribute = $resource->getProductAttribute();
            if ($productAttribute) {
                $this->productAttributeUpdater->update($resource, $productAttribute);
            }

            /** @var ResourceControllerEvent $event */
            $event = $this->eventDispatcher->dispatchPreEvent(ResourceActions::UPDATE, $configuration, $resource);

            if ($event->isStopped() && !$configuration->isHtmlRequest()) {
                throw new HttpException($event->getErrorCode(), $event->getMessage());
            }
            if ($event->isStopped()) {
                $this->flashHelper->addFlashFromEvent($configuration, $event);

                $eventResponse = $event->getResponse();
                if (null !== $eventResponse) {
                    return $eventResponse;
                }

                return $this->redirectHandler->redirectToResource($configuration, $resource);
            }

            try {
                $this->resourceUpdateHandler->handle($resource, $configuration, $this->manager);
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

            $postEvent = $this->eventDispatcher->dispatchPostEvent(ResourceActions::UPDATE, $configuration, $resource);

            if (!$configuration->isHtmlRequest()) {
                if ($configuration->getParameters()->get('return_content', false)) {
                    return $this->createRestView($configuration, $resource, Response::HTTP_OK);
                }

                return $this->createRestView($configuration, null, Response::HTTP_NO_CONTENT);
            }

            $postEventResponse = $postEvent->getResponse();
            if (null !== $postEventResponse) {
                return $postEventResponse;
            }

            return $this->redirectHandler->redirectToResource($configuration, $resource);
        }

        if (!$configuration->isHtmlRequest()) {
            return $this->createRestView($configuration, $form, Response::HTTP_BAD_REQUEST);
        }

        $initializeEvent = $this->eventDispatcher->dispatchInitializeEvent(ResourceActions::UPDATE, $configuration, $resource);
        $initializeEventResponse = $initializeEvent->getResponse();
        if (null !== $initializeEventResponse) {
            return $initializeEventResponse;
        }

        return $this->render($configuration->getTemplate(ResourceActions::UPDATE . '.html'), [
            'configuration' => $configuration,
            'metadata' => $this->metadata,
            'resource' => $resource,
            $this->metadata->getName() => $resource,
            'form' => $form->createView(),
        ]);
    }

    public function createAction(Request $request): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);

        $this->isGrantedOr403($configuration, ResourceActions::CREATE);

        /**
         * This three lines uses custom factory to create attribute rest is default Sylius controller
         */
        $type = $request->attributes->get('type');
        $currentVendor = $this->vendorProvider->provideCurrentVendor();
        $newResource = $this->draftAttributeFactory->createTyped($type, $currentVendor);
        $form = $this->resourceFormFactory->create($configuration, $newResource);

        $form->handleRequest($request);

        if ($request->isMethod('POST') && $form->isSubmitted() && $form->isValid()) {
            $newResource = $form->getData();

            $event = $this->eventDispatcher->dispatchPreEvent(ResourceActions::CREATE, $configuration, $newResource);

            if ($event->isStopped() && !$configuration->isHtmlRequest()) {
                throw new HttpException($event->getErrorCode(), $event->getMessage());
            }
            if ($event->isStopped()) {
                $this->flashHelper->addFlashFromEvent($configuration, $event);

                $eventResponse = $event->getResponse();
                if (null !== $eventResponse) {
                    return $eventResponse;
                }

                return $this->redirectHandler->redirectToIndex($configuration, $newResource);
            }

            if ($configuration->hasStateMachine()) {
                $stateMachine = $this->getStateMachine();
                $stateMachine->apply($configuration, $newResource);
            }

            $this->repository->add($newResource);

            if ($configuration->isHtmlRequest()) {
                $this->flashHelper->addSuccessFlash($configuration, ResourceActions::CREATE, $newResource);
            }

            $postEvent = $this->eventDispatcher->dispatchPostEvent(ResourceActions::CREATE, $configuration, $newResource);

            if (!$configuration->isHtmlRequest()) {
                return $this->createRestView($configuration, $newResource, Response::HTTP_CREATED);
            }

            $postEventResponse = $postEvent->getResponse();
            if (null !== $postEventResponse) {
                return $postEventResponse;
            }

            return $this->redirectHandler->redirectToResource($configuration, $newResource);
        }

        if (!$configuration->isHtmlRequest()) {
            return $this->createRestView($configuration, $form, Response::HTTP_BAD_REQUEST);
        }

        $initializeEvent = $this->eventDispatcher->dispatchInitializeEvent(ResourceActions::CREATE, $configuration, $newResource);
        $initializeEventResponse = $initializeEvent->getResponse();
        if (null !== $initializeEventResponse) {
            return $initializeEventResponse;
        }

        return $this->render($configuration->getTemplate(ResourceActions::CREATE . '.html'), [
            'configuration' => $configuration,
            'metadata' => $this->metadata,
            'resource' => $newResource,
            $this->metadata->getName() => $newResource,
            'form' => $form->createView(),
        ]);
    }

    /**
     * All methods bellow are responsible for render form for different attribute types
     */
    public function getAttributeTypesAction(Request $request, string $template): Response
    {
        /** @var ServiceRegistryInterface $serviceRegistry */
        $serviceRegistry = $this->get('sylius.registry.attribute_type');

        return $this->render(
            $template,
            [
                'types' => $serviceRegistry->all(),
                'metadata' => $this->metadata,
            ]
        );
    }

    public function renderAttributesAction(Request $request): Response
    {
        /** @var FormFactoryInterface $formFactory */
        $formFactory = $this->get('form.factory');

        $template = $request->attributes->get('template', '@SyliusAttribute/attributeChoice.html.twig');

        $form = $formFactory->create(DraftAttributeChoiceType::class, null, [
            'multiple' => true,
        ]);

        return $this->render($template, ['form' => $form->createView()]);
    }

    public function renderAttributeValueFormsAction(Request $request): Response
    {
        /** @var FormFactoryInterface $formFactory */
        $formFactory = $this->get('form.factory');

        $template = $request->attributes->get('template', '@SyliusAttribute/attributeValueForms.html.twig');

        $form = $formFactory->create(DraftAttributeChoiceType::class, null, [
            'multiple' => true,
        ]);
        $form->handleRequest($request);

        $attributes = $form->getData();
        if (null === $attributes) {
            throw new BadRequestHttpException();
        }

        /** @var TranslationLocaleProviderInterface $localeProvider */
        $localeProvider = $this->get('sylius.translation_locale_provider');
        $localeCodes = $localeProvider->getDefinedLocalesCodes();

        $forms = [];
        foreach ($attributes as $attribute) {
            $forms[$attribute->getCode()] = $this->getAttributeFormsInAllLocales($attribute, $localeCodes);
        }

        return $this->render($template, [
            'forms' => $forms,
            'count' => $request->query->get('count'),
            'metadata' => $this->metadata,
        ]);
    }

    /**
     * @param array|string[] $localeCodes
     *
     * @return array|FormView[]
     */
    protected function getAttributeFormsInAllLocales(AttributeInterface $attribute, array $localeCodes): array
    {
        /** @var FormTypeRegistry $formRegistry */
        $formRegistry = $this->get('sylius.form_registry.attribute_type');

        /** @var string $type */
        $type = $attribute->getType();

        /** @var string $attributeForm */
        $attributeForm = $formRegistry->get($type, 'default');

        $forms = [];

        if (!$attribute->isTranslatable()) {
            array_push($localeCodes, null);

            return [null => $this->createFormAndView($attributeForm, $attribute)];
        }

        foreach ($localeCodes as $localeCode) {
            $forms[$localeCode] = $this->createFormAndView($attributeForm, $attribute);
        }

        return $forms;
    }

    private function createFormAndView(
        string $attributeForm,
        AttributeInterface $attribute
    ): FormView {
        /** @var FormFactoryInterface $formFactory */
        $formFactory = $this->get('form.factory');

        return $formFactory
            ->createNamed(
                'value',
                $attributeForm,
                null,
                ['label' => $attribute->getName(), 'configuration' => $attribute->getConfiguration()]
            )
            ->createView();
    }
}
