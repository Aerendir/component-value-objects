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
    /**
     * @var string
     */
    private const EMAIL = 'email';

    /**
     * @param array<string,mixed> $fieldDeclaration
     * @param AbstractPlatform    $platform
     *
     * @codeCoverageIgnore
     *
     * @return string
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
     *
     * @return \SerendipityHQ\Component\ValueObjects\Email\Email|null
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
     * @param Email $value
     *
     * @throws StringsException
     * @throws \InvalidArgumentException
     *
     * @return string|null
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        if (null === $value || '' === $value) {
            return null;
        }

        if ( ! $value instanceof Email) {
            $type = \is_object($value) ? \get_class($value) : \gettype($value);
            throw new \InvalidArgumentException(sprintf('You have to pass an object of kind \SerendipityHQ\Component\ValueObjects\Email\Email to use the Doctrine type EmailType. "%s" passed instead.', $type));
        }

        // Validate the $value as a valid email
        $validator = new EmailValidator();

        if ( ! $validator->isValid($value, new RFCValidation())) {
            throw new \InvalidArgumentException(sprintf('An email field accepts only valid email addresses. The value "%s" is not a valid email.', $value));
        }

        // The value is automatically transformed into a string thans to the __toString() method
        return (string) $value;
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
        return self::EMAIL;
    }
}
