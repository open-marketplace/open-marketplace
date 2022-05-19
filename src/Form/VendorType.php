<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Form;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\CustomerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use Sylius\Bundle\CoreBundle\Form\Type\Customer\CustomerRegistrationType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\UserBundle\Form\Type\UserType;
use Sylius\Component\Core\Model\ShopUserInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VendorType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('companyName', TextType::class, [
//                'label' => 'bitbag_sylius_organization_plugin.ui.organization_name',
            ])
            ->add('taxIdentifier', TextType::class)
            ->add('phoneNumber', TextType::class)
            ->add('vendorAddress', VendorAddressType::class)
            ->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event): void {
                /** @var CustomerInterface $customer */
                $customer = $event->getData();

                /** @var ShopUserInterface $user */
//                $user = $customer->getUser();

//                $user->addRole(Vendor::ROLE_VENDOR);
//                dd($customer);
                $event->setData($customer);
            })
            ;   
        
    }
    
//    public function getParent(): string
//    {
//        return UserRefgType::class;
//    }
    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vendor::class,
            'validation_groups' => $this->validationGroups,
        ]);
    }
}
