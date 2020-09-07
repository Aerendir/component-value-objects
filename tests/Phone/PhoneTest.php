<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Component\ValueObjects\Tests\Phone;

use libphonenumber\PhoneNumber;
use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Phone\Phone;
use SerendipityHQ\Component\ValueObjects\Phone\PhoneInterface;

final class PhoneTest extends TestCase
{
    /** @var array<string, string> */
    private const TEST = [
        PhoneInterface::NUMBER => '3331234567',
        PhoneInterface::REGION => 'IT',
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
