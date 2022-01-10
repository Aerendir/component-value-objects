<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Component\ValueObjects\Tests\Tax;

use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Money\Money;
use SerendipityHQ\Component\ValueObjects\Tax\Tax;
use SerendipityHQ\Component\ValueObjects\Tax\TaxInterface;

/**
 * Tests the Tax Class.
 *
 * @since Alpha
 */
final class TaxTest extends TestCase
{
    public function testTax(): void
    {
        $testData = [
            TaxInterface::CODE     => 'IVA IT',
            TaxInterface::COMPOUND => false,
            TaxInterface::RATE     => 22.0,
            TaxInterface::AMOUNT   => $this->createMock(Money::class),
            TaxInterface::TITLE    => 'IVA IT',
        ];

        $resource = new Tax($testData);

        // Test the value object direct interface
        self::assertInstanceOf(TaxInterface::class, $resource);

        // Test the type of value object interface
        self::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        self::assertSame($testData[TaxInterface::CODE], $resource->getCode());
        self::assertFalse($resource->isCompound());
        self::assertSame($testData[TaxInterface::RATE], $resource->getRate());
        self::assertEquals($testData[TaxInterface::AMOUNT], $resource->getAmount());
        self::assertSame($testData[TaxInterface::TITLE], $resource->getTitle());
        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }
}
