<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Form\Type\Conversation;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Conversation\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

final class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', TextareaType::class, [
                'label' => 'mvm.ui.form.conversation.messages',
                'attr' => [
                    'maxlength' => 500,
                ],
            ])
            ->add('file', FileType::class, [
                'label' => 'mvm.ui.form.conversation_message.file',
                'required' => false,
                'constraints' => [
                    new File([
                       'maxSize' => '10485760',
                    ]),
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'mvm.ui.form.conversation_message.submit',
            ])
            ->addEventListener(FormEvents::SUBMIT, [$this, 'onSubmit'])
        ;
    }
    public function onSubmit(FormEvent $event): void
    {

    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefault('data_class', Message::class);
    }

    public function getBlockPrefix(): string
    {
        return 'mvm_conversation_message';
    }
}
