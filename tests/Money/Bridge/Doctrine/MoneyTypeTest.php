<?php

declare(strict_types=1);

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Component\ValueObjects\Tests\Money\Bridge\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Money\Bridge\Doctrine\MoneyType;
use SerendipityHQ\Component\ValueObjects\Money\Money;
use SerendipityHQ\Component\ValueObjects\Money\MoneyInterface;

final class MoneyTypeTest extends TestCase
{
    private MoneyType $type;

    /** @var AbstractPlatform&MockObject */
    private MockObject $platform;

    protected function setUp(): void
    {
        $this->type     = new MoneyType();
        $this->platform = $this->createMock(AbstractPlatform::class);
    }

    public function testGetName(): void
    {
        self::assertSame('money', $this->type->getName());
    }

    public function testConvertsAPositiveAmountBackAndForth(): void
    {
        $money = new Money([MoneyInterface::BASE_AMOUNT => 1050, MoneyInterface::CURRENCY => 'EUR']);

        $databaseValue = $this->type->convertToDatabaseValue($money, $this->platform);
        self::assertSame('1050-EUR', $databaseValue);

        $result = $this->type->convertToPHPValue($databaseValue, $this->platform);
        self::assertInstanceOf(Money::class, $result);
        self::assertSame('1050', $result->getBaseAmount());
        self::assertSame('EUR', $result->getCurrency()->getCode());
    }

    public function testConvertsANegativeAmountBackAndForth(): void
    {
        $money = new Money([MoneyInterface::BASE_AMOUNT => -1050, MoneyInterface::CURRENCY => 'EUR']);

        $databaseValue = $this->type->convertToDatabaseValue($money, $this->platform);
        self::assertSame('-1050-EUR', $databaseValue);

        $result = $this->type->convertToPHPValue($databaseValue, $this->platform);
        self::assertInstanceOf(Money::class, $result);
        self::assertSame('-1050', $result->getBaseAmount());
        self::assertSame('EUR', $result->getCurrency()->getCode());
    }

    public function testConvertToPHPValueHandlesNullAndEmptyString(): void
    {
        self::assertNull($this->type->convertToPHPValue(null, $this->platform));
        self::assertNull($this->type->convertToPHPValue('', $this->platform));
    }

    public function testConvertToDatabaseValueRejectsOtherObjects(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->type->convertToDatabaseValue(new \stdClass(), $this->platform);
    }
}
