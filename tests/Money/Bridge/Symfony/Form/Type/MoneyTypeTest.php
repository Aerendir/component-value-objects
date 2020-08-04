<?php

/*
 * This file is part of PHP Value Objects.
 *
 * Copyright Adamo Aerendir Crespi 2015-2017.
 *
 * @author    Adamo Aerendir Crespi <hello@aerendir.me>
 * @copyright Copyright (C) 2015 - 2020 Aerendir. All rights reserved.
 * @license   MIT
 */

namespace SerendipityHQ\Component\ValueObjects\Tests\Money\Bridge\Symfony\Form\Type;

use SerendipityHQ\Component\ValueObjects\Money\Bridge\Symfony\Form\Type\MoneyType;
use SerendipityHQ\Component\ValueObjects\Money\Money;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * Tests the MoneyType class.
 */
final class MoneyTypeTest extends TypeTestCase
{
    public function testMoney(): void
    {
        $values = [
            'humanAmount' => '12,45',
            'currency'    => 'EUR',
        ];

        $objectToCompare = new Money($values);
        $form            = $this->factory->create(MoneyType::class, $objectToCompare, ['data_class' => null]);

        $object = new Money($values);

        // submit the data to the form directly
        $form->submit($values['humanAmount']);

        self::assertTrue($form->isSynchronized());

        // check that $objectToCompare was modified as expected when the form was submitted
        self::assertEquals($object, $objectToCompare);
    }

    public function testMoneyWithNullValues(): void
    {
        $values = [
            'humanAmount' => '12,45',
            'currency'    => 'EUR',
        ];

        $objectToCompare = new Money($values);
        $form            = $this->factory->create(MoneyType::class, $objectToCompare, ['data_class' => null]);

        // submit the data to the form directly
        $form->submit($values['humanAmount']);

        self::assertTrue($form->isSynchronized());
    }
}
