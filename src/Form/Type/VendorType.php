<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Form\Type;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShopUser;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use BitBag\SyliusMultiVendorMarketplacePlugin\Exception\UserNotFoundException;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Component\Core\Model\ShopUserInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Exception\TokenNotFoundException;
use Symfony\Component\Validator\Constraints\Valid;

final class VendorType extends AbstractResourceType
{
    private TokenStorageInterface $tokenStorage;

    public function __construct(
        TokenStorageInterface $tokenStorage,
        string $dataClass,
        array $validationGroups = []
    ) {
        parent::__construct($dataClass, $validationGroups);

        $this->tokenStorage = $tokenStorage;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('shopUser', EntityType::class, [
                'class' => ShopUser::class,
            ])
            ->add('companyName', TextType::class, [
                'label' => 'bitbag_mvm_plugin.ui.company_name',
            ])
            ->add('taxIdentifier', TextType::class, [
                'label' => 'bitbag_mvm_plugin.ui.tax_identifier',
            ])
            ->add('phoneNumber', TelType::class, [
                'label' => 'bitbag_mvm_plugin.ui.phone_number',
            ])
            ->add('vendorAddress', VendorAddressType::class, [
                'label' => 'bitbag_mvm_plugin.ui.company_address',
                'constraints' => [new Valid()],
            ])
            ->addEventListener(FormEvents::POST_SET_DATA, function (FormEvent $event): void {
                $token = $this->tokenStorage->getToken();
                if (null === $token) {
                    throw new TokenNotFoundException('No token found.');
                }

                /** @var ShopUserInterface $user */
                $user = $token->getUser();
                if (!$user instanceof ShopUserInterface) {
                    throw new UserNotFoundException('No user found.');
                }

                $form = $event->getForm();
                $form->get('shopUser')->setData($user);
                $event->setData($form);
            });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vendor::class,
            'validation_groups' => $this->validationGroups,
        ]);
    }
}
