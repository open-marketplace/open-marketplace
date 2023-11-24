<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Admin\Form\Type;

use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

final class SettlementStatusFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'status',
            ChoiceType::class,
            [
                'label' => false,
                'choices' => SettlementInterface::AVAILABLE_STATUSES,
                'choice_label' => fn (string $status) => sprintf('open_marketplace.ui.settlement_status.%s', $status),
                'required' => false,
            ]
        );
    }
}
