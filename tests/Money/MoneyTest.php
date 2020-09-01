<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
final class MoneyTest extends TestCase
{
    public function testBaseUnits(): void
    {
        $test = [
            'baseAmount'   => 100,
            'currency'     => 'EUR',
        ];

        $resource = new Money($test);

        // Test the value object direct interface
        self::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        self::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        self::assertSame((string) $test['baseAmount'], $resource->getBaseAmount());
        self::assertSame('1.00', $resource->getHumanAmount());
        self::assertInstanceOf(Currency::class, $resource->getCurrency());
        self::assertSame('EUR', $resource->getCurrency()->getCode());
        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }

    public function testHumanInt(): void
    {
        $test = [
            'humanAmount'   => 10,
            'currency'      => 'EUR',
        ];

        $resource = new Money($test);

        // Test the value object direct interface
        self::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        self::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        self::assertSame('1000', $resource->getBaseAmount());
        self::assertSame('10.00', $resource->getHumanAmount());
        self::assertInstanceOf(Currency::class, $resource->getCurrency());
        self::assertSame('EUR', $resource->getCurrency()->getCode());
        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }

    public function testHumanFloat(): void
    {
        $test = [
            'humanAmount'   => 10.50,
            'currency'      => 'EUR',
        ];

        $resource = new Money($test);

        // Test the value object direct interface
        self::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        self::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        self::assertSame('1050', $resource->getBaseAmount());
        self::assertSame('10.50', $resource->getHumanAmount());
        self::assertInstanceOf(Currency::class, $resource->getCurrency());
        self::assertSame('EUR', $resource->getCurrency()->getCode());
        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }

    public function testHumanIntAsFloat(): void
    {
        $test = [
            'humanAmount'   => 10.00,
            'currency'      => 'EUR',
        ];

        $resource = new Money($test);

        // Test the value object direct interface
        self::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        self::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        self::assertSame('1000', $resource->getBaseAmount());
        self::assertSame('10.00', $resource->getHumanAmount());
        self::assertInstanceOf(Currency::class, $resource->getCurrency());
        self::assertSame('EUR', $resource->getCurrency()->getCode());
        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }

    public function testHumanIntAsString(): void
    {
        $test = [
            'humanAmount'   => '10',
            'currency'      => 'EUR',
        ];

        $resource = new Money($test);

        // Test the value object direct interface
        self::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        self::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        self::assertSame('1000', $resource->getBaseAmount());
        self::assertSame('10.00', $resource->getHumanAmount());
        self::assertInstanceOf(Currency::class, $resource->getCurrency());
        self::assertSame('EUR', $resource->getCurrency()->getCode());
        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }

    public function testHumanFloatAsString(): void
    {
        $test = [
            'humanAmount'   => '12.34',
            'currency'      => 'EUR',
        ];

        $resource = new Money($test);

        // Test the value object direct interface
        self::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        self::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        self::assertSame('1234', $resource->getBaseAmount());
        self::assertSame('12.34', $resource->getHumanAmount());
        self::assertInstanceOf(Currency::class, $resource->getCurrency());
        self::assertSame('EUR', $resource->getCurrency()->getCode());
        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }

    public function testHumanIntAsFloatAsString(): void
    {
        $test = [
            'humanAmount'   => '12.00',
            'currency'      => 'EUR',
        ];

        $resource = new Money($test);

        // Test the value object direct interface
        self::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        self::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        self::assertSame('1200', $resource->getBaseAmount());
        self::assertSame('12.00', $resource->getHumanAmount());
        self::assertInstanceOf(Currency::class, $resource->getCurrency());
        self::assertSame('EUR', $resource->getCurrency()->getCode());
        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }

    public function testHumanFloatAsStringWithComma(): void
    {
        $test = [
            'humanAmount'   => '12,34',
            'currency'      => 'EUR',
        ];

        $resource = new Money($test);

        // Test the value object direct interface
        self::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        self::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        self::assertSame('1234', $resource->getBaseAmount());
        self::assertSame('12.34', $resource->getHumanAmount());
        self::assertInstanceOf(Currency::class, $resource->getCurrency());
        self::assertSame('EUR', $resource->getCurrency()->getCode());
        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }

    public function testSum(): void
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
        self::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        self::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        self::assertSame('1577', $resource->getBaseAmount());
        self::assertSame('15.77', $resource->getHumanAmount());
        self::assertInstanceOf(Currency::class, $resource->getCurrency());
        self::assertSame('EUR', $resource->getCurrency()->getCode());
        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }

    public function testSubtract(): void
    {
        $first = [
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
        self::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        self::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        self::assertSame('913', $resource->getBaseAmount());
        self::assertSame('9.13', $resource->getHumanAmount());
        self::assertInstanceOf(Currency::class, $resource->getCurrency());
        self::assertSame('EUR', $resource->getCurrency()->getCode());
        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }
}
