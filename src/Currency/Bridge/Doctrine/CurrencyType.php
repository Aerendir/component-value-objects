<?php

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
use Safe\Exceptions\StringsException;
use function Safe\sprintf;

/**
 * A custom datatype to persist a Currency Value Object with Doctrine.
 *
 * @author Adamo Crespi <hello@aerendir.me>
 */
final class CurrencyType extends Type
{
    /**
     * @var string
     */
    private const CURRENCY = 'currency';

    /**
     * @param array<string,mixed> $fieldDeclaration
     * @param AbstractPlatform    $platform
     *
     * @return string
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform): string
    {
        return $platform->getVarcharTypeDeclarationSQL($fieldDeclaration);
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultLength(AbstractPlatform $platform): int
    {
        return 3;
    }

    /**
     * {@inheritdoc}
     *
     * @psalm-suppress MixedArgument
     *
     * @return \Money\Currency|string|null
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if (null === $value || '' === $value) {
            return $value;
        }

        return new Currency($value);
    }

    /**
     * {@inheritdoc}
     *
     * @param Currency $value
     *
     * @throws StringsException
     * @throws \InvalidArgumentException
     *
     * @return \Money\Currency|string|null
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
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

    /**
     * {@inheritdoc}
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return ! parent::requiresSQLCommentHint($platform);
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return self::CURRENCY;
    }
}
