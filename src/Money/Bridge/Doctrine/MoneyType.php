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

namespace SerendipityHQ\Component\ValueObjects\Money\Bridge\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Money\Currency;
use SerendipityHQ\Component\ValueObjects\Money\Money;
use SerendipityHQ\Component\ValueObjects\Money\MoneyInterface;

final class MoneyType extends Type
{
    /** @var string */
    public const NAME = 'money';

    /**
     * @param array<string,mixed> $column
     */
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getStringTypeDeclarationSQL($column);
    }

    public function getDefaultLength(AbstractPlatform $platform): int
    {
        return 255;
    }

    /**
     * The database holds "<base amount>-<currency code>": the amount can be negative, so
     * the currency is what follows the last dash.
     */
    public function convertToPHPValue(mixed $value, AbstractPlatform $platform): ?Money
    {
        if ($value instanceof Money) {
            return $value;
        }

        if ( ! \is_string($value) || '' === $value) {
            return null;
        }

        $separator = \strrpos($value, '-');
        if (false === $separator) {
            return null;
        }

        $currency = \substr($value, $separator + 1);
        if ('' === $currency) {
            return null;
        }

        return new Money([MoneyInterface::BASE_AMOUNT => (int) \substr($value, 0, $separator), MoneyInterface::CURRENCY => new Currency($currency)]);
    }

    public function convertToDatabaseValue(mixed $value, AbstractPlatform $platform): ?string
    {
        if (null === $value || '' === $value) {
            return $value;
        }

        if ( ! $value instanceof Money) {
            throw new \InvalidArgumentException(\sprintf('You have to pass an object of kind \\SerendipityHQ\\Component\\ValueObjects\\Money\\Money to use the Doctrine type MoneyType. "%s" passed instead.', \get_debug_type($value)));
        }

        return $value->getBaseAmount() . '-' . $value->getCurrency()->getCode();
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
