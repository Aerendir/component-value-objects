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

namespace SerendipityHQ\Component\ValueObjects\Money\Bridge\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Money\Currency;
use Money\Exception\ParserException;
use Safe\Exceptions\StringsException;
use function Safe\sprintf;
use SerendipityHQ\Component\ValueObjects\Money\Money;

/**
 * A custom datatype to persist a Money Value Object with Doctrine.
 *
 * @author Adamo Crespi <hello@aerendir.me>
 */
class MoneyType extends Type
{
    /**
     * @var string
     */
    public const MONEY = 'money';

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
    public function getDefaultLength(AbstractPlatform $platform)
    {
        return $platform->getVarcharDefaultLength();
    }

    /**
     * {@inheritdoc}
     *
     * @throws \InvalidArgumentException
     * @throws ParserException
     * @psalm-suppress MixedArgument
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if (null === $value || '' === $value) {
            return $value;
        }

        $objects = explode('-', $value);

        $currency = new Currency($objects[1]);

        return new Money(['baseAmount' => (int) $objects[0], 'currency' => $currency]);
    }

    /**
     * {@inheritdoc}
     *
     * @param Money $value
     *
     * @throws \InvalidArgumentException
     * @throws StringsException
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (null === $value || '' === $value) {
            return $value;
        }

        if ( ! $value instanceof Money) {
            $type = is_object($value) ? get_class($value) : gettype($value);
            throw new \InvalidArgumentException(sprintf('You have to pass an object of kind \SerendipityHQ\Component\ValueObjects\Money\Money to use the Doctrine type MoneyType. "%s" passed instead.', $type));
        }

        return $value->getBaseAmount() . '-' . $value->getCurrency()->getCode();
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
        return self::MONEY;
    }
}
