<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Admin\Form\Type;

use BitBag\OpenMarketplace\Component\Settlement\Repository\SettlementRepositoryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

final class SettlementPeriodFilterType extends AbstractType
{
    public function __construct(
        private SettlementRepositoryInterface $settlementRepository,
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'period',
            ChoiceType::class,
            [
                'label' => false,
                'choices' => $this->settlementRepository->findAllPeriods(),
                'choice_label' => fn (string $period) => $period,
                'required' => false,
            ]
        );
    }
}
