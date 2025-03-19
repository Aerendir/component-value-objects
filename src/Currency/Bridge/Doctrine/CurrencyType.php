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

use function Safe\sprintf;

/**
 * A custom datatype to persist a Currency Value Object with Doctrine.
 *
 * @author Adamo Crespi <hello@aerendir.me>
 */
final class CurrencyType extends Type
{
    /** @var string */
    public const NAME = 'currency';

    /**
     * @param array<string,mixed> $column
     */
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getVarcharTypeDeclarationSQL($column);
    }

    public function getDefaultLength(AbstractPlatform $platform): int
    {
        return 3;
    }

    /**
     * @psalm-suppress MixedArgument
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): ?Currency
    {
        if (is_string($value) && '' !== $value) {
            $value = new Currency($value);
        }

        if (false === $value instanceof Currency) {
            $value = null;
        }

        return $value;
    }

    /**
     * @param Currency|string|null $value
     *
     * @return Currency|string|null
     *
     * @psalm-suppress DocblockTypeContradiction
     * @psalm-suppress MixedArgument
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform):?string
    {
        if (null === $value || '' === $value) {
            return $value;
        }

        if ( ! $value instanceof Currency) {
            $type = \is_object($value) ? \get_class($value) : \gettype($value);

            throw new \InvalidArgumentException(sprintf('You have to pass an object of kind \Money\Currency to use the Doctrine type CurrencyType. "%s" passed instead.', $type));
        }

        // The value is automatically transformed into a string thanks to the __toString() method
        return $value;
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return ! parent::requiresSQLCommentHint($platform);
    }

    public function getName(): string
    {
        return self::NAME;
    }
}
