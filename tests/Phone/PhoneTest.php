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

namespace SerendipityHQ\Component\ValueObjects\tests\Phone;

use libphonenumber\PhoneNumber as BasePhone;
use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Phone\Phone;
use SerendipityHQ\Component\ValueObjects\Phone\PhoneInterface;

/**
 * Tests the Phone class.
 */
class PhoneTest extends TestCase
{
    public function testPhone()
    {
        $test = [
            'number' => '3331234567',
            'region' => 'IT',
        ];

        $resource = new Phone($test);

        // Test the value object direct interface
        $this::assertInstanceOf(PhoneInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        // Test inherits the base object
        $this::assertInstanceOf(BasePhone::class, $resource);

        $this::assertIsString($resource->__toString());
        $this::assertIsString($resource->toString());
    }
}
