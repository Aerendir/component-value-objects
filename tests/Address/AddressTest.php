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

namespace SerendipityHQ\Component\ValueObjects\Tests\Address;

use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Address\Address;
use SerendipityHQ\Component\ValueObjects\Address\AddressInterface;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Tests the Address class.
 */
final class AddressTest extends TestCase
{
    /**
     * @var string[]
     */
    private const VALUES = [
        'countryCode'        => 'IT',
        'administrativeArea' => 'Salerno',
        'locality'           => 'Naples',
        'dependentLocality'  => 'Dependent locality',
        'postalCode'         => '12345',
        'street'             => 'Via via vieni via con me',
        'extraLine'          => 'Niente più ti lega a questi luoghi',
    ];
    public function testAddress(): void
    {
        $resource = new Address(self::VALUES);
        // Test the value object direct interface
        self::assertInstanceOf(AddressInterface::class, $resource);
        // Test the type of value object interface
        self::assertInstanceOf(ComplexValueObjectInterface::class, $resource);
        self::assertSame(self::VALUES['countryCode'], $resource->getCountryCode());
        self::assertSame(self::VALUES['administrativeArea'], $resource->getAdministrativeArea());
        self::assertSame(self::VALUES['locality'], $resource->getLocality());
        self::assertSame(self::VALUES['dependentLocality'], $resource->getDependentLocality());
        self::assertSame(self::VALUES['postalCode'], $resource->getPostalCode());
        self::assertSame(self::VALUES['street'], $resource->getStreet());
        self::assertSame(self::VALUES['extraLine'], $resource->getExtraLine());
    }

    public function testToStringThrowsAnException(): void
    {
        $resource = new Address([]);

        self::expectException(\RuntimeException::class);
        $resource->__toString();
    }
}
