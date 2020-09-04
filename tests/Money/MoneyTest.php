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
            MoneyInterface::BASE_AMOUNT => 100,
            MoneyInterface::CURRENCY    => 'EUR',
        ];

        $resource = new Money($test);

        // Test the value object direct interface
        self::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        self::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        self::assertSame((string) $test[MoneyInterface::BASE_AMOUNT], $resource->getBaseAmount());
        self::assertSame('1.00', $resource->getHumanAmount());
        self::assertInstanceOf(Currency::class, $resource->getCurrency());
        self::assertSame('EUR', $resource->getCurrency()->getCode());
        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }

    public function testHumanInt(): void
    {
        $test = [
            MoneyInterface::HUMAN_AMOUNT => 10,
            MoneyInterface::CURRENCY     => 'EUR',
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
            MoneyInterface::HUMAN_AMOUNT => 10.50,
            MoneyInterface::CURRENCY     => 'EUR',
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
            MoneyInterface::HUMAN_AMOUNT => 10.00,
            MoneyInterface::CURRENCY     => 'EUR',
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
            MoneyInterface::HUMAN_AMOUNT => '10',
            MoneyInterface::CURRENCY     => 'EUR',
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
            MoneyInterface::HUMAN_AMOUNT => '12.34',
            MoneyInterface::CURRENCY     => 'EUR',
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
            MoneyInterface::HUMAN_AMOUNT => '12.00',
            MoneyInterface::CURRENCY     => 'EUR',
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
            MoneyInterface::HUMAN_AMOUNT => '12,34',
            MoneyInterface::CURRENCY     => 'EUR',
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
            MoneyInterface::HUMAN_AMOUNT => 12.45,
            MoneyInterface::CURRENCY     => 'EUR',
        ];
        $firstMoney = new Money($first);

        $second = [
            MoneyInterface::HUMAN_AMOUNT => '3,32',
            MoneyInterface::CURRENCY     => 'EUR',
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
            MoneyInterface::HUMAN_AMOUNT => 12.45,
            MoneyInterface::CURRENCY     => 'EUR',
        ];
        $firstMoney = new Money($first);

        $second = [
            MoneyInterface::HUMAN_AMOUNT => '3,32',
            MoneyInterface::CURRENCY     => 'EUR',
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
