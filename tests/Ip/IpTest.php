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

namespace SerendipityHQ\Component\ValueObjects\tests\Ip;

use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Common\SimpleValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Ip\Ip;
use SerendipityHQ\Component\ValueObjects\Ip\IpInterface;

/**
 * Tests the Ip class.
 */
class IpTest extends TestCase
{
    public function testIp()
    {
        $test = '127.0.0.1';

        $resource = new Ip($test);

        // Test the value object direct interface
        $this::assertInstanceOf(IpInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(SimpleValueObjectInterface::class, $resource);

        self::assertIsString($resource->toString());
    }
}
