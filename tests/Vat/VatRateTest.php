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

namespace SerendipityHQ\Component\ValueObjects\tests\Vat;

use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Common\SimpleValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Tax\Tax;
use SerendipityHQ\Component\ValueObjects\Vat\VatRate;
use SerendipityHQ\Component\ValueObjects\Vat\VatRateInterface;

/**
 * Tests the Tax Class.
 *
 * @since Alpha
 */
class VatRateTest extends TestCase
{
    public function testTax()
    {
        $testData = [
            'countryCode' => 'IT',
            'percentage'  => 22.0000,
        ];

        $resource = new VatRate($testData['countryCode']);

        // Test the value object direct interface
        $this::assertInstanceOf(VatRateInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(SimpleValueObjectInterface::class, $resource);

        $this::assertEquals($testData['countryCode'], $resource->getCountryCode());
        $this::assertEquals($testData['percentage'], $resource->getPercentage());
        $this::assertIsString($resource->__toString());
        $this::assertIsString($resource->toString());
    }
}
