<?php

namespace SerendipityHQ\Component\ValueObjects\Uri\Persistence;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use SerendipityHQ\Component\ValueObjects\Currency\Currency;
use SerendipityHQ\Component\ValueObjects\Money\Money;
use SerendipityHQ\Component\ValueObjects\Uri\Uri;
use SerendipityHQ\Component\ValueObjects\Uri\UriInterface;

/**
 * A custom datatype to persist an Uri Value Object with Doctrine.
 *
 * @author Adamo Crespi <hello@aerendir.me>
 */
class UriType extends Type
{
    const URI = 'uri';

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
        if (null === $value || '' === $value) {
            return $value;
        }

        return new Uri($value);
    }

    /**
     * {@inheritdoc}
     *
     * @param Money $value
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (null === $value || '' === $value) {
            return $value;
        }

        if (!$value instanceof UriInterface) {
            throw new \InvalidArgumentException('You have to pass an object of kind \SerendipityHQ\Component\ValueObjects\Uri\UriInterface to use the Doctrine type UriType.');
        }

        return $value->__toString();
    }

    /**
     * {@inheritdoc}
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        return !parent::requiresSQLCommentHint($platform);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return self::URI;
    }
}
