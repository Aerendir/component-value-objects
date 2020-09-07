<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Component\ValueObjects\Money\Bridge\Symfony\Form\Type;

use SerendipityHQ\Component\ValueObjects\Money\Bridge\Symfony\Form\DataTransformer\MoneyTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType as SfMoneyType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @author Adamo Crespi <hello@aerendir.me>
 */
final class MoneyType extends AbstractType
{
    /**
     * {@inheritDoc}
     *
     * @psalm-suppress MixedArgumentTypeCoercion
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->addModelTransformer(new MoneyTransformer($options));
    }

    /**
     * {@inheritDoc}
     */
    public function getParent(): string
    {
        return SfMoneyType::class;
    }

    /**
     * {@inheritDoc}
     */
    public function getBlockPrefix(): string
    {
        return 'shq_money';
    }
}
