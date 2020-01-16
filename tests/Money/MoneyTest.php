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

namespace SerendipityHQ\Component\ValueObjects\Tests\Money;

use Money\Currency;
use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Money\Money;
use SerendipityHQ\Component\ValueObjects\Money\MoneyInterface;

/**
 * {@inheritdoc}
 */
class MoneyTest extends TestCase
{
    public function testBaseUnits()
    {
        $test = [
            'baseAmount'   => 100,
            'currency'     => 'EUR',
        ];

        $resource = new Money($test);

        // Test the value object direct interface
        $this::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        $this::assertSame((string) $test['baseAmount'], $resource->getBaseAmount());
        $this::assertSame('1.00', $resource->getHumanAmount());
        $this::assertInstanceOf(Currency::class, $resource->getCurrency());
        $this::assertSame('EUR', $resource->getCurrency()->getCode());
        $this::assertIsString($resource->__toString());
        $this::assertIsString($resource->toString());
    }

    public function testHumanInt()
    {
        $test = [
            'humanAmount'   => 10,
            'currency'      => 'EUR',
        ];

        $resource = new Money($test);

        // Test the value object direct interface
        $this::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        $this::assertSame('1000', $resource->getBaseAmount());
        $this::assertSame('10.00', $resource->getHumanAmount());
        $this::assertInstanceOf(Currency::class, $resource->getCurrency());
        $this::assertSame('EUR', $resource->getCurrency()->getCode());
        $this::assertIsString($resource->__toString());
        $this::assertIsString($resource->toString());
    }

    public function testHumanFloat()
    {
        $test = [
            'humanAmount'   => 10.50,
            'currency'      => 'EUR',
        ];

        $resource = new Money($test);

        // Test the value object direct interface
        $this::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        $this::assertSame('1050', $resource->getBaseAmount());
        $this::assertSame('10.50', $resource->getHumanAmount());
        $this::assertInstanceOf(Currency::class, $resource->getCurrency());
        $this::assertSame('EUR', $resource->getCurrency()->getCode());
        $this::assertIsString($resource->__toString());
        $this::assertIsString($resource->toString());
    }

    public function testHumanIntAsFloat()
    {
        $test = [
            'humanAmount'   => 10.00,
            'currency'      => 'EUR',
        ];

        $resource = new Money($test);

        // Test the value object direct interface
        $this::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        $this::assertSame('1000', $resource->getBaseAmount());
        $this::assertSame('10.00', $resource->getHumanAmount());
        $this::assertInstanceOf(Currency::class, $resource->getCurrency());
        $this::assertSame('EUR', $resource->getCurrency()->getCode());
        $this::assertIsString($resource->__toString());
        $this::assertIsString($resource->toString());
    }

    public function testHumanIntAsString()
    {
        $test = [
            'humanAmount'   => '10',
            'currency'      => 'EUR',
        ];

        $resource = new Money($test);

        // Test the value object direct interface
        $this::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        $this::assertSame('1000', $resource->getBaseAmount());
        $this::assertSame('10.00', $resource->getHumanAmount());
        $this::assertInstanceOf(Currency::class, $resource->getCurrency());
        $this::assertSame('EUR', $resource->getCurrency()->getCode());
        $this::assertIsString($resource->__toString());
        $this::assertIsString($resource->toString());
    }

    public function testHumanFloatAsString()
    {
        $test = [
            'humanAmount'   => '12.34',
            'currency'      => 'EUR',
        ];

        $resource = new Money($test);

        // Test the value object direct interface
        $this::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        $this::assertSame('1234', $resource->getBaseAmount());
        $this::assertSame('12.34', $resource->getHumanAmount());
        $this::assertInstanceOf(Currency::class, $resource->getCurrency());
        $this::assertSame('EUR', $resource->getCurrency()->getCode());
        $this::assertIsString($resource->__toString());
        $this::assertIsString($resource->toString());
    }

    public function testHumanIntAsFloatAsString()
    {
        $test = [
            'humanAmount'   => '12.00',
            'currency'      => 'EUR',
        ];

        $resource = new Money($test);

        // Test the value object direct interface
        $this::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        $this::assertSame('1200', $resource->getBaseAmount());
        $this::assertSame('12.00', $resource->getHumanAmount());
        $this::assertInstanceOf(Currency::class, $resource->getCurrency());
        $this::assertSame('EUR', $resource->getCurrency()->getCode());
        $this::assertIsString($resource->__toString());
        $this::assertIsString($resource->toString());
    }

    public function testHumanFloatAsStringWithComma()
    {
        $test = [
            'humanAmount'   => '12,34',
            'currency'      => 'EUR',
        ];

        $resource = new Money($test);

        // Test the value object direct interface
        $this::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        $this::assertSame('1234', $resource->getBaseAmount());
        $this::assertSame('12.34', $resource->getHumanAmount());
        $this::assertInstanceOf(Currency::class, $resource->getCurrency());
        $this::assertSame('EUR', $resource->getCurrency()->getCode());
        $this::assertIsString($resource->__toString());
        $this::assertIsString($resource->toString());
    }

    public function testSum()
    {
        $first = [
            // This represents 3.05 Euros
            'humanAmount' => 12.45,
            'currency'    => 'EUR',
        ];
        $firstMoney = new Money($first);

        $second = [
            'humanAmount' => '3,32',
            'currency'    => 'EUR',
        ];
        $secondMoney = new Money($second);

        $resource = $firstMoney->add($secondMoney);

        // Test the value object direct interface
        $this::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        $this::assertSame('1577', $resource->getBaseAmount());
        $this::assertSame('15.77', $resource->getHumanAmount());
        $this::assertInstanceOf(Currency::class, $resource->getCurrency());
        $this::assertSame('EUR', $resource->getCurrency()->getCode());
        $this::assertIsString($resource->__toString());
        $this::assertIsString($resource->toString());
    }

    public function testSubtract()
    {
        $first = [
            // This represents 3.05 Euros
            'humanAmount' => 12.45,
            'currency'    => 'EUR',
        ];
        $firstMoney = new Money($first);

        $second = [
            'humanAmount' => '3,32',
            'currency'    => 'EUR',
        ];
        $secondMoney = new Money($second);

        $resource = $firstMoney->subtract($secondMoney);

        // Test the value object direct interface
        $this::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        $this::assertSame('913', $resource->getBaseAmount());
        $this::assertSame('9.13', $resource->getHumanAmount());
        $this::assertInstanceOf(Currency::class, $resource->getCurrency());
        $this::assertSame('EUR', $resource->getCurrency()->getCode());
        $this::assertIsString($resource->__toString());
        $this::assertIsString($resource->toString());
    }
}
