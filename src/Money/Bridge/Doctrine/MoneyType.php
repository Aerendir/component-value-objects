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

use function Safe\sprintf;

/**
 * A custom datatype to persist a Money Value Object with Doctrine.
 */
final class MoneyType extends Type
{
    /** @var string */
    public const NAME = 'money';

    /**
     * @param array<string,mixed> $column
     */
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getVarcharTypeDeclarationSQL($column);
    }

    public function getDefaultLength(AbstractPlatform $platform): int
    {
        return 255;
    }

    /**
     * @psalm-suppress MixedArgument
     *
     * @return mixed|Money|string|null
     */
    public function convertToPHPValue($value, AbstractPlatform $platform):?Money
    {
        if (null === $value || '' === $value || false === is_string($value)) {
            return $value;
        }

        $objects  = \explode('-', $value);
        $currency = $objects[1];

        if (is_string($currency) && '' !== $currency) {
            $currency = new Currency($currency);
        }

        if (false === $currency instanceof Currency) {
            return null;
        }

        return new Money([MoneyInterface::BASE_AMOUNT => (int) $objects[0], MoneyInterface::CURRENCY => $currency]);
    }

    /**
     * @param Money|string|null $value
     *
     * @psalm-suppress DocblockTypeContradiction
     * @psalm-suppress MixedArgument
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        if (null === $value || '' === $value) {
            return $value;
        }

        if ( ! $value instanceof Money) {
            $type = \is_object($value) ? \get_class($value) : \gettype($value);

            throw new \InvalidArgumentException(sprintf('You have to pass an object of kind \SerendipityHQ\Component\ValueObjects\Money\Money to use the Doctrine type MoneyType. "%s" passed instead.', $type));
        }

        return $value->getBaseAmount() . '-' . $value->getCurrency()->getCode();
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
