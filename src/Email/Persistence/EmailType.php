<?php
namespace SerendipityHQ\Component\ValueObjects\Money\Persistence;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;
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
        return new Email($value);
    }

    /**
     * {@inheritdoc}
     *
     * @param Email $value
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->getEmail();
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return self::EMAIL;
    }
}
