<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Component\ValueObjects\Tests\Email\Bridge\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Email\Bridge\Doctrine\EmailType;
use SerendipityHQ\Component\ValueObjects\Email\Email;

/**
 * @author Adamo Crespi <hello@aerendir.me>
 */
final class EmailTypeTest extends TestCase
{
    /** @var string */
    private const EMAIL_VALUE = 'hello@aexample.com';

    /** @var EmailType */
    private $type;

    /** @var MockObject&AbstractPlatform */
    private $platform;

    protected function setUp(): void
    {
        if (false === Type::hasType(EmailType::NAME)) {
            Type::addType(EmailType::NAME, EmailType::class);
        }

        /** @var EmailType $type */
        $type           = Type::getType(EmailType::NAME);
        $this->type     = $type;
        $this->platform = $this->getMockForAbstractClass(AbstractPlatform::class);
    }

    public function testGetName(): void
    {
        self::assertSame('email', $this->type->getName());
    }

    public function testConvertToPHPValue(): void
    {
        $result = $this->type->convertToPHPValue('hello@serendipityhq.com', $this->platform);
        self::assertInstanceOf(Email::class, $result);
    }

    public function testConvertToPHPValueHandlesNull(): void
    {
        $result = $this->type->convertToPHPValue(null, $this->platform);
        self::assertNull($result);
    }

    public function testConvertToPHPValueHandlesEmptyString(): void
    {
        $result = $this->type->convertToPHPValue('', $this->platform);
        self::assertNull($result);
    }

    public function testConvertToDatabaseValue(): void
    {
        $email      = new Email(self::EMAIL_VALUE);
        $result     = $this->type->convertToDatabaseValue($email, $this->platform);
        self::assertSame(self::EMAIL_VALUE, $result);
    }

    public function testConvertToDatabaseValueHandlesNull(): void
    {
        $result = $this->type->convertToDatabaseValue(null, $this->platform);
        self::assertNull($result);
    }

    public function testConvertToDatabaseValueHandlesEmptyString(): void
    {
        $result = $this->type->convertToDatabaseValue('', $this->platform);
        self::assertNull($result);
    }

    /**
     * @suppress PhanTypeMismatchArgumentProbablyReal
     */
    public function testConvertToDatabaseValueValidatesEmail(): void
    {
        $mockEmail = $this->createMock(Email::class);
        $mockEmail->method('__toString')->willReturn('hello-serendipityhq.com');

        $this->expectException(\InvalidArgumentException::class);
        $this->type->convertToDatabaseValue($mockEmail, $this->platform);
    }
}
