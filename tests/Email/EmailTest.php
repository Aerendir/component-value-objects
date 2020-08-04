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

namespace SerendipityHQ\Component\ValueObjects\Tests\Email;

use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Common\SimpleValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Email\Email;
use SerendipityHQ\Component\ValueObjects\Email\EmailInterface;

/**
 * Tests the Email class.
 */
final class EmailTest extends TestCase
{
    public function testEmail(): void
    {
        $test = 'user@example.com';

        $resource = new Email($test);

        // Test the value object direct interface
        self::assertInstanceOf(EmailInterface::class, $resource);

        // Test the type of value object interface
        self::assertInstanceOf(SimpleValueObjectInterface::class, $resource);

        self::assertEquals($test, $resource->getEmail());
        self::assertEquals('user', $resource->getMailBox());
        self::assertEquals('example.com', $resource->getHost());
        self::assertIsString($resource->toString());
    }

    public function testInvalidEmailThrowsAnException(): void
    {
        $test = 'user-example';

        $this->expectException(\InvalidArgumentException::class);
        $resource = new Email($test);
    }

    public function testChangeMailBox(): void
    {
        $test = 'user@example.com';

        $resource = new Email($test);

        $result = $resource->changeMailBox('user2');

        self::assertSame('user2@example.com', $result->getEmail());
        self::assertNotSame($resource, $result);
    }
}
