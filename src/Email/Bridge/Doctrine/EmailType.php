<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Component\ValueObjects\Email\Bridge\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;
use Safe\Exceptions\StringsException;
use function Safe\sprintf;
use SerendipityHQ\Component\ValueObjects\Email\Email;

/**
 * A custom datatype to persist an Email Value Object with Doctrine.
 *
 * @author Adamo Crespi <hello@aerendir.me>
 */
final class EmailType extends Type
{
    /** @var string */
    public const NAME = 'email';

    /**
     * @param array<string,mixed> $fieldDeclaration
     *
     * @codeCoverageIgnore
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform): string
    {
        return $platform->getVarcharTypeDeclarationSQL($fieldDeclaration);
    }

    /**
     * {@inheritdoc}
     *
     * @codeCoverageIgnore
     */
    public function getDefaultLength(AbstractPlatform $platform): int
    {
        return $platform->getVarcharDefaultLength();
    }

    /**
     * {@inheritdoc}
     *
     * @psalm-suppress MixedArgument
     *
     * @throws \InvalidArgumentException
     * @throws StringsException
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): ?\SerendipityHQ\Component\ValueObjects\Email\Email
    {
        if (null === $value || '' === $value) {
            return null;
        }

        return new Email($value);
    }

    /**
     * {@inheritdoc}
     *
     * @param Email|string|null $value
     *
     * @throws StringsException
     * @throws \InvalidArgumentException
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        if (null === $value || '' === $value) {
            return null;
        }

        if ($value instanceof Email) {
            $value = $value->toString();
        }

        if (false === \is_string($value)) {
            throw new \InvalidArgumentException(sprintf('An email field accepts only valid email addresses, as "string" or as "%s".', Email::class, $value));
        }

        // Validate the $value as a valid email
        $validator = new EmailValidator();

        if ( ! $validator->isValid($value, new RFCValidation())) {
            throw new \InvalidArgumentException(sprintf('An email field accepts only valid email addresses. The value "%s" is not a valid email.', $value));
        }

        // The value is automatically transformed into a string thans to the __toString() method
        return $value;
    }

    /**
     * {@inheritdoc}
     *
     * @codeCoverageIgnore
     *
     * @throws StringsException
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
        return self::NAME;
    }
}
