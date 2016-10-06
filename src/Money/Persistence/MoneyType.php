<?php

namespace SerendipityHQ\Component\ValueObjects\Money\Persistence;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use SerendipityHQ\Component\ValueObjects\Currency\Currency;
use SerendipityHQ\Component\ValueObjects\Money\Money;

/**
 * A custom datatype to persist a Money Value Object with Doctrine.
 *
 * @author Adamo Crespi <hello@aerendir.me>
 */
class MoneyType extends Type
{
    const MONEY = 'money';

    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
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
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $objects = explode('-', $value);

        $currency = new Currency($objects[1]);

        return new Money(['amount' => $objects[0], 'currency' => $currency]);
    }

    /**
     * {@inheritdoc}
     *
     * @param Money $value
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->getAmount() . '-' . $value->getCurrency()->getCurrencyCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return self::MONEY;
    }
}
