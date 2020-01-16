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

use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Defines the minimum requisites of a VatNumber Value Object.
 */
interface VatNumberInterface extends ComplexValueObjectInterface
{
    /**
     * Method to retrieve the country code in ISO format of the VatNumber.
     *
     * @return string The country code of the VAT Number
     */
    public function getCountryCode(): string;

    /**
     * Returns the number part of the VAT Number.
     *
     * @return int
     */
    public function getNumber(): int;

    /**
     * Method to get the full VAT Number, with ISC country code.
     *
     * @return string
     */
    public function getVatNumber(): string;
}
