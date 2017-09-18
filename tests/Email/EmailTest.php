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

namespace SerendipityHQ\Component\ValueObjects\tests\Email;

use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Common\SimpleValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Email\Email;
use SerendipityHQ\Component\ValueObjects\Email\EmailInterface;

/**
 * Tests the Email class.
 */
class EmailTest extends TestCase
{
    public function testEmail()
    {
        $test = 'user@example.com';

        $resource = new Email($test);

        // Test the value object direct interface
        $this::assertInstanceOf(EmailInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(SimpleValueObjectInterface::class, $resource);

        $this::assertEquals($test, $resource->getEmail());
        $this::assertEquals('user', $resource->getMailBox());
        $this::assertEquals('example.com', $resource->getHost());
        $this::assertTrue(is_string($resource->toString()));
    }

    public function testInvalidEmailThrowsAnException()
    {
        $test = 'user-example';

        $this->expectException(\InvalidArgumentException::class);
        $resource = new Email($test);
    }

    public function testChangeMailBox()
    {
        $test = 'user@example.com';

        $resource = new Email($test);

        $result = $resource->changeMailBox('user2');

        $this::assertSame('user2@example.com', $result->getEmail());
        $this::assertNotSame($resource, $result);
    }
}
