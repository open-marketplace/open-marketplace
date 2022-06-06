<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Form;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Customer;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\CustomerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Exception\UserNotFoundException;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorImageFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Generator\VendorSlugGeneratorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Uploader\FileUploaderInterface;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Component\Core\Model\ShopUserInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Exception\TokenNotFoundException;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Valid;

class VendorType extends AbstractResourceType
{
    private TokenStorageInterface $tokenStorage;

    private VendorSlugGeneratorInterface $vendorSlugGenerator;

    private VendorImageFactoryInterface $vendorImageFactory;

    private FileUploaderInterface $fileUploader;

    public function __construct(
        string $dataClass,
        TokenStorageInterface $tokenStorage,
        array $validationGroups = [],
        VendorSlugGeneratorInterface $vendorSlugGenerator,
        VendorImageFactoryInterface $vendorImageFactory,
        FileUploaderInterface $fileUploader
    ) {
        parent::__construct($dataClass, $validationGroups);
        $this->tokenStorage = $tokenStorage;
        $this->vendorSlugGenerator = $vendorSlugGenerator;
        $this->vendorImageFactory = $vendorImageFactory;
        $this->fileUploader = $fileUploader;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('customer', EntityType::class, [
                'class' => Customer::class,
            ])
            ->add('companyName', TextType::class, [
                'label' => 'bitbag_sylius_multi_vendor_marketplace_plugin.ui.company_name',
            ])
            ->add('taxIdentifier', TextType::class, [
                'label' => 'bitbag_sylius_multi_vendor_marketplace_plugin.ui.tax_identifier',
            ])
            ->add('phoneNumber', TextType::class, [
                'label' => 'bitbag_sylius_multi_vendor_marketplace_plugin.ui.phone_number',
            ])
            ->add('vendorAddress', VendorAddressType::class, [
                'label' => 'bitbag_sylius_multi_vendor_marketplace_plugin.ui.company_address',
                'constraints' => [new Valid()],
            ])
            ->add('image', FileType::class, [
                'mapped' => false,
                'label' => 'bitbag_sylius_multi_vendor_marketplace_plugin.ui.logo',
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '2048k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/svg+xml',
                        ],
                        'mimeTypesMessage' => 'bitbag_sylius_multi_vendor_marketplace_plugin.ui.invalid_logo',
                    ]),
                ],
            ])
            ->add('description', TextType::class, [
                'label' => 'bitbag_sylius_multi_vendor_marketplace_plugin.ui.description',
            ])
            ->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event): void {
                /** @var UploadedFile $image */
                $image = $event->getForm()->get('image')->getData();
                /** @var VendorInterface $vendor */
                $vendor = $event->getData();

                if ($vendor->getCompanyName()) {
                    $vendor->setSlug($this->vendorSlugGenerator->generateSlug($vendor->getCompanyName()));
                }

                if ($image) {
                    try {
                        $filename = $this->fileUploader->upload(
                            $image,
                            $_ENV['LOGO_DIRECTORY']
                        );

                        $vendorImage = $this->vendorImageFactory->create($filename, $vendor);
                        $vendor->setImage($vendorImage);
                    } catch (FileException $e) {
                        throw new FileException('Could not get the content of the file');
                    }
                }
            })
            ->addEventListener(FormEvents::POST_SET_DATA, function (FormEvent $event): void {
                $token = $this->tokenStorage->getToken();
                if (null === $token) {
                    throw new TokenNotFoundException('No token found.');
                }

                /** @var ShopUserInterface $user */
                $user = $token->getUser();

                if (!($user instanceof ShopUserInterface)) {
                    throw new UserNotFoundException('No user found.');
                }

                /** @var CustomerInterface $customer */
                $customer = $user->getCustomer();
                $form = $event->getForm();
                $form->get('customer')->setData($customer);
                $event->setData($form);
            })
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vendor::class,
            'validation_groups' => $this->validationGroups,
        ]);
    }
}
