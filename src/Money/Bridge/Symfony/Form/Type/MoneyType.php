<?php

/*
 * This file is part of PHP Value Objects.
 *
 * Copyright Adamo Aerendir Crespi 2015-2017.
 *
 * @author    Adamo Aerendir Crespi <hello@aerendir.me>
 * @copyright Copyright (C) 2015 - 2017 Aerendir. All rights reserved.
 * @license   MIT
 */

namespace SerendipityHQ\Component\ValueObjects\Money\Bridge\Symfony\Form\Type;

use SerendipityHQ\Component\ValueObjects\Money\Bridge\Symfony\Form\DataTransformer\MoneyTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType as SfMoneyType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @author Adamo Crespi <hello@aerendir.me>
 */
class MoneyType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->addModelTransformer(new MoneyTransformer($options));
    }

    /**
     * {@inheritdoc}
     */
    public function getParent(): string
    {
        return SfMoneyType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'shq_money';
    }
}
