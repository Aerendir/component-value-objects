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

namespace SerendipityHQ\Component\ValueObjects\Vat;

use Safe\Exceptions\StringsException;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectTrait;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * Default implementation of a VatNumber Value object.
 */
final class VatNumber implements VatNumberInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    /** @var string The country code of the VAT number */
    private $countryCode;

    /** @var int The number part of the VAT number */
    private $number;

    /** @var string The full VAT Number, with country ISO code */
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
    public function getNumber(): int
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
     * @param int $number
     */
    protected function setNumber(int $number): void
    {
        $this->number = $number;
    }

    /**
     * Method to set the full VAT Number.
     *
     * @param string $vatNumber The full VAT number, with country ISO code
     *
     * @throws StringsException
     * @throws \InvalidArgumentException
     */
    protected function setVatNumber(string $vatNumber): void
    {
        $this->vatNumber = $vatNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        return $this->countryCode . ' ' . (string) $this->number;
    }
}
