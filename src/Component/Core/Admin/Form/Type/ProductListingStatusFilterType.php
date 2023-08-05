<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Admin\Form\Type;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

final class ProductListingStatusFilterType extends AbstractType
{
    public const STATUS_UNDER_VERIFICATION = 'open_marketplace.ui.under_verification';

    public const STATUS_VERIFIED = 'open_marketplace.ui.verified';

    public const STATUS_REJECTED = 'open_marketplace.ui.rejected';

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'status',
            ChoiceType::class,
            [
                'label' => false,
                'choices' => [
                    self::STATUS_UNDER_VERIFICATION => DraftInterface::STATUS_UNDER_VERIFICATION,
                    self::STATUS_VERIFIED => DraftInterface::STATUS_VERIFIED,
                    self::STATUS_REJECTED => DraftInterface::STATUS_REJECTED,
                ],
                'required' => false,
            ]
        );
    }
}
