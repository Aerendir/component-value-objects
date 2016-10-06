<?php

namespace SerendipityHQ\Component\ValueObjects\Email\Persistence;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;
use SerendipityHQ\Component\ValueObjects\Email\Email;

/**
 * A custom datatype to persist an Email Value Object with Doctrine.
 *
 * @author Adamo Crespi <hello@aerendir.me>
 */
class EmailType extends Type
{
    const EMAIL = 'email';

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

        try {
            // Try to create an object
            return new Email($value);
        } catch (\InvalidArgumentException $e) {
            // If it is not possible to create the object, simply return the value as is
            return $value;
        }
    }

    /**
     * {@inheritdoc}
     *
     * @param Email $value
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value instanceof Email) {
            return $value->getEmail();
        }

        // Validate the $value as a valid email
        $validator = new EmailValidator();

        if (!$validator->isValid($value, new RFCValidation())) {
            throw new \InvalidArgumentException(sprintf('An email field accepts only valid email address. The value "%s" is not a valid email.', $value));
        }

        return $value;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return self::EMAIL;
    }
}
