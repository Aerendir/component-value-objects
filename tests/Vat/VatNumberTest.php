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

namespace SerendipityHQ\Component\ValueObjects\tests\Vat;

use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Vat\VatNumber;
use SerendipityHQ\Component\ValueObjects\Vat\VatNumberInterface;

/**
 * Tests the VatNumber Class.
 *
 * @since 2.3
 */
class VatNumberTest extends TestCase
{
    public function testVatNumber()
    {
        $testData = [
            'countryCode' => 'IT',
            'number'      => '01234567891',
            'vatNumber'   => 'IT01234567891',
        ];

        $resource = new VatNumber($testData);

        // Test the value object direct interface
        $this::assertInstanceOf(VatNumberInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        $this::assertEquals($testData['countryCode'], $resource->getCountryCode());
        $this::assertEquals($testData['number'], $resource->getNumber());
        $this::assertEquals($testData['vatNumber'], $resource->getVatNumber());
        $this::assertTrue(is_string($resource->__toString()));
        $this::assertTrue(is_string($resource->toString()));
    }

    public function testSetNumberAcceptsOnlyStrings()
    {
        $testData = [
            'countryCode' => 'IT',
            'number'      => 12345678900,
            'vatNumber'   => 'IT01234567891',
        ];

        $this->expectException(\InvalidArgumentException::class);
        $resource = new VatNumber($testData);
    }

    public function testSetVatNumberAcceptsOnlyStrings()
    {
        $testData = [
            'countryCode' => 'IT',
            'number'      => 'IT01234567891',
            'vatNumber'   => 12345678900,
        ];

        $this->expectException(\InvalidArgumentException::class);
        $resource = new VatNumber($testData);
    }
}
