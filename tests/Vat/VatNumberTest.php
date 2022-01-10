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
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Vat\VatNumber;
use SerendipityHQ\Component\ValueObjects\Vat\VatNumberInterface;

/**
 * Tests the VatNumber Class.
 *
 * @since 2.3
 */
final class VatNumberTest extends TestCase
{
    /** @var array<string, string> */
    private const TEST_DATA = [
        VatNumberInterface::COUNTRY_CODE => 'IT',
        VatNumberInterface::NUMBER       => '01234567891',
        VatNumberInterface::VAT_NUMBER   => 'IT01234567891',
    ];

    public function testVatNumber(): void
    {
        $resource = new VatNumber(self::TEST_DATA);
        // Test the value object direct interface
        self::assertInstanceOf(VatNumberInterface::class, $resource);
        // Test the type of value object interface
        self::assertInstanceOf(ComplexValueObjectInterface::class, $resource);
        self::assertSame(self::TEST_DATA[VatNumberInterface::COUNTRY_CODE], $resource->getCountryCode());
        self::assertSame(self::TEST_DATA[VatNumberInterface::NUMBER], $resource->getNumber());
        self::assertSame(self::TEST_DATA[VatNumberInterface::VAT_NUMBER], $resource->getVatNumber());
        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }
}
