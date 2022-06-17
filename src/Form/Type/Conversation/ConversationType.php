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
use BitBag\SyliusMultiVendorMarketplacePlugin\Resolver\ActualUserResolverInterface;
use Sylius\Component\Core\Model\AdminUserInterface;
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
    private ActualUserResolverInterface $actualUserResolver;

    private VendorRepository $vendorRepository;

    public function __construct(
        ActualUserResolverInterface $actualUserResolver,
        VendorRepository $vendorRepository
    ) {
        $this->actualUserResolver = $actualUserResolver;
        $this->vendorRepository = $vendorRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'label' => 'mvm.ui.form.conversation.category',
                'choice_label' => 'name',
            ])
            ->add('messages', CollectionType::class, [
                'entry_type' => MessageType::class,
                'allow_add' => true,
            ])
            ->addEventListener(FormEvents::SUBMIT, [$this, 'onSubmit'])
            ->addEventListener(FormEvents::POST_SET_DATA, [$this, 'postSetData']);
        //dd("a");
    }

    public function postSetData(FormEvent $event): void
    {
        $user = $this->actualUserResolver->resolve();

        if ($user instanceof AdminUserInterface) {
            $form = $event->getForm();

            $form->add('vendorUser', ChoiceType::class, [
                'choices' => [
                    'Vendors' => $this->vendorRepository->findAll(),
                ],
                'choice_label' => 'companyName',
                'mapped' => false,
                'label' => 'mvm.ui.form.conversation.users',
            ]);

            $form->remove('category');
        }
    }

    public function onSubmit(FormEvent $event): void
    {
        /** @var ConversationInterface $conversation */
        $conversation = $event->getData();

        $resolvedUser = $this->actualUserResolver->resolve();

        if ($event->getForm()->has('vendorUser') && $resolvedUser instanceof AdminUserInterface) {
            $conversation->setApplicant($event->getForm()->get('vendorUser')->getData());
            $conversation->setAdminUser($resolvedUser);

            return;
        }
        $vendor = $resolvedUser->getCustomer()->getVendor();
        $conversation->setApplicant($vendor);
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
