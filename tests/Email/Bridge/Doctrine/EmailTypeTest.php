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

namespace SerendipityHQ\Component\ValueObjects\Tests\Email\Bridge\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Email\Bridge\Doctrine\EmailType;
use SerendipityHQ\Component\ValueObjects\Email\Email;

/**
 * @author Adamo Crespi <hello@aerendir.me>
 */
final class EmailTypeTest extends TestCase
{
    /** @var EmailType */
    private $type;

    /** @var AbstractPlatform */
    private $platform;
    /**
     * @var string
     */
    private const EMAIL_VALUE = 'hello@aexample.com';

    protected function setUp(): void
    {
        $this->type     = new EmailType();
        $this->platform = $this->getMockForAbstractClass(AbstractPlatform::class);
    }

    public function testGetName(): void
    {
        self::assertSame('email', $this->type->getName());
    }

    public function testConvertToPHPValue(): void
    {
        $result = $this->type->convertToPHPValue('hello@serendipityhq.com', $this->platform);
        $this->assertInstanceOf(Email::class, $result);
    }

    public function testConvertToPHPValueHandlesNull(): void
    {
        $result = $this->type->convertToPHPValue(null, $this->platform);
        $this->assertNull($result);
    }

    public function testConvertToPHPValueHandlesEmptyString(): void
    {
        $result = $this->type->convertToPHPValue('', $this->platform);
        $this->assertNull($result);
    }

    public function testConvertToDatabaseValue(): void
    {
        $email      = new Email(self::EMAIL_VALUE);
        $result     = $this->type->convertToDatabaseValue($email, $this->platform);
        $this->assertSame(self::EMAIL_VALUE, $result);
    }

    public function testConvertToDatabaseValueHandlesNull(): void
    {
        $result = $this->type->convertToDatabaseValue(null, $this->platform);
        $this->assertNull($result);
    }

    public function testConvertToDatabaseValueHandlesEmptyString(): void
    {
        $result = $this->type->convertToDatabaseValue('', $this->platform);
        $this->assertNull($result);
    }

    public function testConvertToDatabaseValueAcceptsOnlyEmailObjects(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->type->convertToDatabaseValue('hello@serendipityhq.com', $this->platform);
    }

    public function testConvertToDatabaseValueValidatesEmail(): void
    {
        $mockEmail = $this->createMock(Email::class);
        $mockEmail->method('__toString')->willReturn('hello-serendipityhq.com');

        $this->expectException(\InvalidArgumentException::class);
        $this->type->convertToDatabaseValue($mockEmail, $this->platform);
    }
}
