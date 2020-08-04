<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Component\ValueObjects\Tests\Vat;

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
final class VatRateTest extends TestCase
{
    /**
     * @var float[]|string[]
     */
    private const TEST_DATA = [
        'countryCode' => 'IT',
        'percentage'  => 22.0000,
    ];

    public function testTax(): void
    {
        $resource = new VatRate(self::TEST_DATA['countryCode']);
        // Test the value object direct interface
        self::assertInstanceOf(VatRateInterface::class, $resource);
        // Test the type of value object interface
        self::assertInstanceOf(SimpleValueObjectInterface::class, $resource);
        self::assertEquals(self::TEST_DATA['countryCode'], $resource->getCountryCode());
        self::assertEquals(self::TEST_DATA['percentage'], $resource->getPercentage());
        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }
}
