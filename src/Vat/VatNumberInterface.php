<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
