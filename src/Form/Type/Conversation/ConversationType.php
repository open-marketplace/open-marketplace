<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Form\Type\Conversation;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Conversation\Category;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Conversation\Conversation;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Conversation\ConversationInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\VendorRepository;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\VendorRepositoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Resolver\CurrentUserResolverInterface;
use Sylius\Component\Core\Model\AdminUserInterface;
use Sylius\Component\Core\Model\ShopUser;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ConversationType extends AbstractType
{
    private CurrentUserResolverInterface $currentUserResolver;

    private VendorRepositoryInterface $vendorRepository;

    public function __construct(
        CurrentUserResolverInterface $currentUserResolver,
        VendorRepository $vendorRepository,
    ) {
        $this->currentUserResolver = $currentUserResolver;
        $this->vendorRepository = $vendorRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'label' => 'bitbag_mvm_plugin.ui.form.conversation.category',
                'choice_label' => 'name',
            ])
            ->add('messages', CollectionType::class, [
                'entry_type' => MessageType::class,
                'allow_add' => true,
            ])
            ->addEventListener(FormEvents::SUBMIT, [$this, 'onSubmit'])
            ->addEventListener(FormEvents::POST_SET_DATA, [$this, 'postSetData']);
    }

    public function postSetData(FormEvent $event): void
    {
        $user = $this->currentUserResolver->resolve();

        if ($user instanceof AdminUserInterface) {
            $form = $event->getForm();

            $form->add('vendorUser', ChoiceType::class, [
                'choices' => [
                    'Vendors' => $this->vendorRepository->findAll(),
                ],
                'choice_label' => 'companyName',
                'mapped' => false,
                'label' => 'bitbag_mvm_plugin.ui.form.conversation.users',
            ]);

            $form->remove('category');
        }
    }

    public function onSubmit(FormEvent $event): void
    {
        /** @var ConversationInterface $conversation */
        $conversation = $event->getData();

        $resolvedUser = $this->currentUserResolver->resolve();

        if ($event->getForm()->has('vendorUser') && $resolvedUser instanceof AdminUserInterface) {
            if ($event->getForm()->get('vendorUser')->getData()) {
                $vendor = $event->getForm()->get('vendorUser')->getData();
                $user = $vendor->getshopUser();
                $conversation->setShopUser($user);

                return;
            }
        }

        if ($resolvedUser instanceof ShopUser) {
            $conversation->setShopUser($resolvedUser);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefault('data_class', Conversation::class);
    }

    public function getBlockPrefix(): string
    {
        return 'mvm_conversation';
    }
}