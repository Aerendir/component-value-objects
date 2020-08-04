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

namespace SerendipityHQ\Component\ValueObjects\Tests\Ip;

use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Common\SimpleValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Ip\Ip;
use SerendipityHQ\Component\ValueObjects\Ip\IpInterface;

/**
 * Tests the Ip class.
 */
final class IpTest extends TestCase
{
    /**
     * @var string
     */
    private const TEST = '127.0.0.1';
    public function testIp(): void
    {
        $resource = new Ip(self::TEST);
        // Test the value object direct interface
        self::assertInstanceOf(IpInterface::class, $resource);
        // Test the type of value object interface
        self::assertInstanceOf(SimpleValueObjectInterface::class, $resource);
        self::assertIsString($resource->toString());
    }
}
