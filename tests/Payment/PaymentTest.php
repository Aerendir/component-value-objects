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

namespace SerendipityHQ\Component\ValueObjects\Tests\Payment;

use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Payment\Payment;
use SerendipityHQ\Component\ValueObjects\Payment\PaymentInterface;

/**
 * Tests the Payment Class.
 */
final class PaymentTest extends TestCase
{
    /**
     * @var string[]
     */
    private const TEST_DATA = [
        'method'   => 'PayPal',
        'status'   => 'A random status',
    ];
    public function testPayment(): void
    {
        $resource = new Payment(self::TEST_DATA);
        // Test the value object direct interface
        self::assertInstanceOf(PaymentInterface::class, $resource);
        // Test the type of value object interface
        self::assertInstanceOf(ComplexValueObjectInterface::class, $resource);
        self::assertEquals(self::TEST_DATA['method'], $resource->getMethod());
        self::assertEquals(self::TEST_DATA['status'], $resource->getStatus());
        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }
}
