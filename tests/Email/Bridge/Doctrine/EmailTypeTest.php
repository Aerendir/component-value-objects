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
class EmailTypeTest extends TestCase
{
    /** @var EmailType $type */
    private $type;

    /** @var AbstractPlatform $platform */
    private $platform;

    protected function setUp(): void
    {
        $typeBuilder    = $this->getMockBuilder(EmailType::class)->disableOriginalConstructor()->setMethods(null);
        $this->type     = $typeBuilder->getMock();
        $this->platform = $this->getMockForAbstractClass(AbstractPlatform::class);
    }

    public function testGetName()
    {
        $name = $this->type->getName();
        $this->assertSame('email', $name);
    }

    public function testConvertToPHPValue()
    {
        $result = $this->type->convertToPHPValue('hello@serendipityhq.com', $this->platform);
        $this->assertInstanceOf(Email::class, $result);
    }

    public function testConvertToPHPValueHandlesNull()
    {
        $result = $this->type->convertToPHPValue(null, $this->platform);
        $this->assertNull($result);
    }

    public function testConvertToPHPValueHandlesEmptyString()
    {
        $result = $this->type->convertToPHPValue('', $this->platform);
        $this->assertNull($result);
    }

    public function testConvertToDatabaseValue()
    {
        $emailValue = 'hello@aexample.com';
        $email      = new Email($emailValue);
        $result     = $this->type->convertToDatabaseValue($email, $this->platform);
        $this->assertSame($emailValue, $result);
    }

    public function testConvertToDatabaseValueHandlesNull()
    {
        $result = $this->type->convertToDatabaseValue(null, $this->platform);
        $this->assertNull($result);
    }

    public function testConvertToDatabaseValueHandlesEmptyString()
    {
        $result = $this->type->convertToDatabaseValue('', $this->platform);
        $this->assertNull($result);
    }

    public function testConvertToDatabaseValueAcceptsOnlyEmailObjects()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->type->convertToDatabaseValue('hello@serendipityhq.com', $this->platform);
    }

    public function testConvertToDatabaseValueValidatesEmail()
    {
        $mockEmail = $this->createMock(Email::class);
        $mockEmail->method('__toString')->willReturn('hello-serendipityhq.com');

        $this->expectException(\InvalidArgumentException::class);
        $this->type->convertToDatabaseValue($mockEmail, $this->platform);
    }
}
