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
class TaxTest extends TestCase
{
    public function testTax()
    {
        $testData = [
            'code'      => 'IVA IT',
            'compound'  => false,
            'rate'      => 22.0,
            'amount'    => $this->getMockBuilder(Money::class)->disableOriginalConstructor()->getMock(),
            'title'     => 'IVA IT',
        ];

        $resource = new Tax($testData);

        // Test the value object direct interface
        $this::assertInstanceOf(TaxInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        $this::assertEquals($testData['code'], $resource->getCode());
        $this::assertFalse($resource->isCompound());
        $this::assertEquals($testData['rate'], $resource->getRate());
        $this::assertEquals($testData['amount'], $resource->getAmount());
        $this::assertEquals($testData['title'], $resource->getTitle());
        $this::assertIsString($resource->__toString());
        $this::assertIsString($resource->toString());
    }
}
