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
            'code'      => 'IVA IT',
            'compound'  => false,
            'rate'      => 22.0,
            'amount'    => $this->createMock(Money::class),
            'title'     => 'IVA IT',
        ];

        $resource = new Tax($testData);

        // Test the value object direct interface
        self::assertInstanceOf(TaxInterface::class, $resource);

        // Test the type of value object interface
        self::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        self::assertEquals($testData['code'], $resource->getCode());
        self::assertFalse($resource->isCompound());
        self::assertEquals($testData['rate'], $resource->getRate());
        self::assertEquals($testData['amount'], $resource->getAmount());
        self::assertEquals($testData['title'], $resource->getTitle());
        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }
}
