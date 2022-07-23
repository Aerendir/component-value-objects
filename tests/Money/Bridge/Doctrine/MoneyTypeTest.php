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
use Doctrine\DBAL\Types\Type;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Money\Bridge\Doctrine\MoneyType;

final class MoneyTypeTest extends TestCase
{
    private MoneyType $type;

    /**
     * @var AbstractPlatform&MockObject
     * @suppress PhanWriteOnlyPrivateProperty
     */
    private $platform;

    protected function setUp(): void
    {
        if (false === Type::hasType(MoneyType::NAME)) {
            Type::addType(MoneyType::NAME, MoneyType::class);
        }

        /** @var MoneyType $type */
        $type           = Type::getType(MoneyType::NAME);
        $this->type     = $type;
        $this->platform = $this->getMockForAbstractClass(AbstractPlatform::class);
    }

    public function testGetName(): void
    {
        self::assertSame('money', $this->type->getName());
    }
}
