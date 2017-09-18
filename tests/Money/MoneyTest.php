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

namespace SerendipityHQ\Component\ValueObjects\tests\Money;

use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Money\Money;
use SerendipityHQ\Component\ValueObjects\Money\MoneyInterface;

class MoneyTest extends TestCase
{
    public function testMoney()
    {
        $test = [
            'amount'   => 100,
            'currency' => 'EUR',
        ];

        $resource = new Money($test);

        // Test the value object direct interface
        $this::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        $this::assertSame('10000', $resource->getAmount());
        $this::assertTrue(is_string($resource->__toString()));
        $this::assertTrue(is_string($resource->toString()));
    }

    public function testMoneyTransformsStringsInIntAndStringsInCurrency()
    {
        $test = [
            'amount'   => '100',
            'currency' => 'EUR',
        ];

        $resource = new Money($test);

        $this::assertSame('10000', $resource->getAmount());
    }
}
