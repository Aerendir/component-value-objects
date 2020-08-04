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
    /**
     * @var string[]
     */
    private const TEST_DATA = [
        'countryCode' => 'IT',
        'number'      => '01234567891',
        'vatNumber'   => 'IT01234567891',
    ];
    public function testVatNumber(): void
    {
        $resource = new VatNumber(self::TEST_DATA);
        // Test the value object direct interface
        self::assertInstanceOf(VatNumberInterface::class, $resource);
        // Test the type of value object interface
        self::assertInstanceOf(ComplexValueObjectInterface::class, $resource);
        self::assertEquals(self::TEST_DATA['countryCode'], $resource->getCountryCode());
        self::assertEquals(self::TEST_DATA['number'], $resource->getNumber());
        self::assertEquals(self::TEST_DATA['vatNumber'], $resource->getVatNumber());
        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }
}
