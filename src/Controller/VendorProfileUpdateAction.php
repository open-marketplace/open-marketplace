<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorProfileFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorProfileUpdateImageFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Form\Type\VendorType;
use BitBag\SyliusMultiVendorMarketplacePlugin\Provider\VendorProviderInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Updater\VendorProfileUpdaterInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Uploader\ImageUploader;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;

final class VendorProfileUpdateAction
{
    private VendorProfileUpdaterInterface $vendorProfileUpdateService;

    private VendorProviderInterface $vendorProvider;

    private FormFactoryInterface $formFactory;

    private RouterInterface $router;

    private VendorProfileFactoryInterface $vendorFactory;

    private EntityManagerInterface $manager;

    private ImageUploader $imageUploader;

    private VendorProfileUpdateImageFactoryInterface $imageFactory;

    public function __construct(
        VendorProfileUpdaterInterface $vendorProfileUpdateService,
        VendorProviderInterface $vendorProvider,
        FormFactoryInterface $formFactory,
        RouterInterface $router,
        VendorProfileFactoryInterface $vendorFactory,
        EntityManagerInterface $manager,
        ImageUploader $imageUploader,
        VendorProfileUpdateImageFactoryInterface $imageFactory,
    ) {
        $this->vendorProfileUpdateService = $vendorProfileUpdateService;
        $this->vendorProvider = $vendorProvider;
        $this->formFactory = $formFactory;
        $this->router = $router;
        $this->vendorFactory = $vendorFactory;
        $this->manager = $manager;
        $this->imageUploader = $imageUploader;
        $this->imageFactory = $imageFactory;
    }

    public function __invoke(Request $request): Response
    {
        $profilePath = $this->router->generate('vendor_profile');
        //$vendor = $this->vendorFactory->createNew();
        $vendor = $this->vendorProvider->provideCurrentVendor();
        $form = $this->formFactory->create(VendorType::class, $vendor);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $currentVendor = $this->vendorProvider->provideCurrentVendor();

            $image = $vendor->getImage();
            $this->vendorProfileUpdateService->createPendingVendorProfileUpdate(
                $form->getData(),
                $currentVendor,
                $image
            );

            $currentVendor->setEditedAt(new \DateTime());
            $this->manager->flush();
        }

        return new RedirectResponse($profilePath);
    }
}
