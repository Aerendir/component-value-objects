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

namespace SerendipityHQ\Component\ValueObjects\Vat;

use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectTrait;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * Default implementation of a VatNumber Value object.
 */
class VatNumber implements VatNumberInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    /** @var string $code The country code of the VAT number */
    private $countryCode;

    /** @var int $number The number part of the VAT number */
    private $number;

    /** @var string $vatNumber The full VAT Number, with country ISO code */
    private $vatNumber;

    /**
     * {@inheritdoc}
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * {@inheritdoc}
     */
    public function getVatNumber(): string
    {
        return $this->vatNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->__toString();
    }

    /**
     * Sets the country code of the VatNumber.
     *
     * @param string $countryCode
     */
    protected function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * Method to set the number part of the VAT Number.
     *
     * @param string $number
     */
    protected function setNumber(string $number): void
    {
        if (false === is_string($number)) {
            throw new \InvalidArgumentException(
                sprintf('The Number MUST be a string. "%s" passed.', gettype($number))
            );
        }
        $this->number = $number;
    }

    /**
     * Method to set the full VAT Number.
     *
     * @param string $vatNumber The full VAT number, with country ISO code
     */
    protected function setVatNumber(string $vatNumber): void
    {
        if (false === is_string($vatNumber)) {
            throw new \InvalidArgumentException(
                sprintf('The VAT Number MUST be a string. "%s" passed.', gettype($vatNumber))
            );
        }
        $this->vatNumber = $vatNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->countryCode . ' ' . $this->number;
    }
}
