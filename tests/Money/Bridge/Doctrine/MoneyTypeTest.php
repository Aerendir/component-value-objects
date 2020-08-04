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

namespace SerendipityHQ\Component\ValueObjects\Tests\Money\Bridge\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Money\Bridge\Doctrine\MoneyType;

final class MoneyTypeTest extends TestCase
{
    /** @var MoneyType */
    private $type;

    /** @var AbstractPlatform */
    private $platform;

    protected function setUp(): void
    {
        $this->type     = new MoneyType();
        $this->platform = $this->getMockForAbstractClass(AbstractPlatform::class);
    }

    public function testGetName(): void
    {
        self::assertSame('money', $this->type->getName());
    }
}
