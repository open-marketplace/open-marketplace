<?php

declare(strict_types=1);
//
///*
// * This file has been created by developers from BitBag.
// * Feel free to contact us once you face any issues or want to start
// * You can find more information about us on https://bitbag.io and write us
// * an email on hello@bitbag.io.
// */
//
//declare(strict_types=1);
//
//namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller;
//
//use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
//use BitBag\SyliusMultiVendorMarketplacePlugin\Form\VendorType;
//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpFoundation\RequestStack;
//use Symfony\Component\HttpFoundation\Response;
//
//final class VendorRegisterAction extends AbstractController
//{
//    private Request $request;
//
//    public function __construct(RequestStack $request)
//    {
//        $this->request = $request->getCurrentRequest();
//    }
//
//    public function __invoke(): Response
//    {
//        $task = new Vendor();
//        $task->setCompanyName("sss");
//
//        $form = $this->createForm(VendorType::class, $task);
////        $form = $this->resourceFormFactory->create(VendorType::class, $task);
//        $form->handleRequest($this->request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            // ... do your form processing, like saving the Task and Tag entities
//        }
//
//        return $this->renderForm('@BitBagSyliusMultiVendorMarketplacePlugin/vendor_register_form.html.twig', [
//            'form' => $form,
//        ]);
//    }
//}
