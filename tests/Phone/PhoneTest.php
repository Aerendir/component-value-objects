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

namespace SerendipityHQ\Component\ValueObjects\Tests\Phone;

use libphonenumber\PhoneNumber;
use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Phone\Phone;
use SerendipityHQ\Component\ValueObjects\Phone\PhoneInterface;

/**
 * Tests the Phone class.
 */
final class PhoneTest extends TestCase
{
    /**
     * @var string[]
     */
    private const TEST = [
        'number' => '3331234567',
        'region' => 'IT',
    ];
    public function testPhone(): void
    {
        $resource = new Phone(self::TEST);
        // Test the value object direct interface
        self::assertInstanceOf(PhoneInterface::class, $resource);
        // Test the type of value object interface
        self::assertInstanceOf(ComplexValueObjectInterface::class, $resource);
        // Test inherits the base object
        self::assertInstanceOf(PhoneNumber::class, $resource);
        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }
}
