<?php

/*
 * This file is part of PHP Value Objects.
 *
 * Copyright Adamo Aerendir Crespi 2015-2017.
 *
 * @author    Adamo Aerendir Crespi <hello@aerendir.me>
 * @copyright Copyright (C) 2015 - 2017 Aerendir. All rights reserved.
 * @license   MIT
 */

namespace SerendipityHQ\Component\ValueObjects\Uri\Bridge\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
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

        if ( ! $value instanceof UriInterface) {
            $type = is_object($value) ? get_class($value) : gettype($value);
            throw new \InvalidArgumentException(sprintf('You have to pass an object of kind \SerendipityHQ\Component\ValueObjects\Uri\UriInterface to use the Doctrine type UriType. "%s" passed instead.', $type));
        }

        return $value->__toString();
    }

    /**
     * {@inheritdoc}
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        return ! parent::requiresSQLCommentHint($platform);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return self::URI;
    }
}
