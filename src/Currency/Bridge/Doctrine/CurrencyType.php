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

namespace SerendipityHQ\Component\ValueObjects\Currency\Bridge\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Money\Currency;

final class CurrencyType extends Type
{
    /** @var string */
    public const NAME = 'currency';

    /**
     * @param array<string,mixed> $column
     */
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getStringTypeDeclarationSQL($column);
    }

    public function getDefaultLength(AbstractPlatform $platform): int
    {
        return 3;
    }

    public function convertToPHPValue(mixed $value, AbstractPlatform $platform): ?Currency
    {
        if ($value instanceof Currency) {
            return $value;
        }

        if (\is_string($value) && '' !== $value) {
            return new Currency($value);
        }

        return null;
    }

    public function convertToDatabaseValue(mixed $value, AbstractPlatform $platform): ?string
    {
        if (null === $value || '' === $value) {
            return $value;
        }

        if ( ! $value instanceof Currency) {
            throw new \InvalidArgumentException(\sprintf('You have to pass an object of kind \\Money\\Currency to use the Doctrine type CurrencyType. "%s" passed instead.', \get_debug_type($value)));
        }

        return $value->getCode();
    }

    /**
     * Asks DBAL 3 to put the type in the column comment, so the schema tool can tell
     * the column from a plain string. DBAL 4 no longer calls this method.
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }

    public function getName(): string
    {
        return self::NAME;
    }
}
