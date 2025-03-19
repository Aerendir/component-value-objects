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

namespace SerendipityHQ\Component\ValueObjects\Uri\Bridge\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use SerendipityHQ\Component\ValueObjects\Uri\Uri;
use SerendipityHQ\Component\ValueObjects\Uri\UriInterface;

use function Safe\sprintf;

/**
 * A custom datatype to persist an Uri Value Object with Doctrine.
 *
 * @author Adamo Crespi <hello@aerendir.me>
 */
final class UriType extends Type
{
    /** @var string */
    public const NAME = 'uri';

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
     * @return string|Uri|null
     */
    public function convertToPHPValue($value, AbstractPlatform $platform):?Uri
    {
        if (null === $value || '' === $value) {
            return $value;
        }

        if (\is_string($value)) {
            $value = new Uri($value);
        }

        if ( ! $value instanceof UriInterface) {
            $type = \is_object($value) ? \get_class($value) : \gettype($value);

            throw new \RuntimeException(sprintf('Impossible to transform the given value of type "%s" into an UriInterface object.', $type));
        }

        return $value;
    }

    /**
     * @param string|UriInterface|null $value
     *
     * @psalm-suppress DocblockTypeContradiction
     * @psalm-suppress MixedArgument
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        if (null === $value || '' === $value) {
            return $value;
        }

        if ( ! $value instanceof UriInterface) {
            $type = \is_object($value) ? \get_class($value) : \gettype($value);

            throw new \InvalidArgumentException(sprintf('You have to pass an object of kind \SerendipityHQ\Component\ValueObjects\Uri\UriInterface to use the Doctrine type UriType. "%s" passed instead.', $type));
        }

        return $value->__toString();
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
