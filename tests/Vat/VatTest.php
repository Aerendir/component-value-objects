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

namespace SerendipityHQ\Component\ValueObjects\tests\Tax;

use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Common\SimpleValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Money\Money;
use SerendipityHQ\Component\ValueObjects\Tax\Tax;
use SerendipityHQ\Component\ValueObjects\Vat\Vat;
use SerendipityHQ\Component\ValueObjects\Vat\VatInterface;

/**
 * Tests the Tax Class.
 *
 * @since Alpha
 */
class VatTest extends TestCase
{
    public function testTax()
    {
        $testData = [
            'countryCode' => 'IT',
            'percentage'  => 22.0000,
        ];

        $resource = new Vat($testData['countryCode']);

        // Test the value object direct interface
        $this::assertInstanceOf(VatInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(SimpleValueObjectInterface::class, $resource);

        $this::assertEquals($testData['countryCode'], $resource->getCountryCode());
        $this::assertEquals($testData['percentage'], $resource->getPercentage());
        $this::assertTrue(is_string($resource->__toString()));
        $this::assertTrue(is_string($resource->toString()));
    }

    public function testSetRateAcceptsOnlyFloats()
    {
        $testData = [
            'code'      => 'IVA IT',
            'compound'  => false,
            'rate'      => 22,
            'taxAmount' => $this->getMockBuilder(Money::class)->disableOriginalConstructor()->getMock(),
            'title'     => 'IVA IT',
        ];

        $this->expectException(\InvalidArgumentException::class);
        $resource = new Tax($testData);
    }
}
