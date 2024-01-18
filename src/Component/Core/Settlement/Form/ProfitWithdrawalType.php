<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Settlement\Form;

use BitBag\OpenMarketplace\Component\Channel\Repository\ChannelRepositoryInterface;
use Sylius\Bundle\MoneyBundle\Form\Type\MoneyType;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Currency\Model\CurrencyInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Webmozart\Assert\Assert;

final class ProfitWithdrawalType extends AbstractType
{
    public function __construct(
        private ChannelRepositoryInterface $channelRepository,
        private RequestStack $requestStack,
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('totalAmount', MoneyType::class, [
                'label' => 'open_marketplace.ui.profit_withdrawal_amount',
                'currency' => $options['currency'],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'open_marketplace.ui.withdraw',
                'attr' => [
                    'class' => 'ui primary big button',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);

        $request = $this->requestStack->getCurrentRequest();
        Assert::notNull($request);

        $channelCode = $request->get('channelCode');
        Assert::notNull($channelCode);

        $channel = $this->channelRepository->findOneEnabledByCode($channelCode);
        Assert::isInstanceOf($channel, ChannelInterface::class);

        $baseCurrency = $channel->getBaseCurrency();
        Assert::isInstanceOf($baseCurrency, CurrencyInterface::class);

        $baseCurrencyCode = $baseCurrency->getCode();
        Assert::notNull($baseCurrencyCode);

        $resolver->setDefault('currency', $baseCurrencyCode);
        $resolver->setDefined('currency');
    }

    public function getBlockPrefix(): string
    {
        return 'bitbag_open_marketplace_profit_withdrawal';
    }
}
