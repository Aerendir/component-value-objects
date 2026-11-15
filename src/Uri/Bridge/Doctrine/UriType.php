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

final class UriType extends Type
{
    /** @var string */
    public const NAME = 'uri';

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

    public function convertToPHPValue(mixed $value, AbstractPlatform $platform): ?Uri
    {
        if (null === $value || '' === $value) {
            return null;
        }

        if ($value instanceof Uri) {
            return $value;
        }

        if ( ! \is_string($value) && ! $value instanceof UriInterface) {
            throw new \RuntimeException(\sprintf('Impossible to transform the given value of type "%s" into an UriInterface object.', \get_debug_type($value)));
        }

        return new Uri($value);
    }

    public function convertToDatabaseValue(mixed $value, AbstractPlatform $platform): ?string
    {
        if (null === $value || '' === $value) {
            return $value;
        }

        if ( ! $value instanceof UriInterface) {
            throw new \InvalidArgumentException(\sprintf('You have to pass an object of kind \\SerendipityHQ\\Component\\ValueObjects\\Uri\\UriInterface to use the Doctrine type UriType. "%s" passed instead.', \get_debug_type($value)));
        }

        return $value->__toString();
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
