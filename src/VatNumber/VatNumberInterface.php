<?php

/**
 *    @author      Aerendir <hello@aerendir.me>
 *    @copyright   Copyright (C) 2014 SerendipityHQ. All rights reserved
 *    @license     SECRETED. No distribution, no copy, no derivative or any other activity or action that could disclose this text
 */
namespace SerendipityHQ\Component\ValueObjects\VatNumber;

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
    public function getCountryCode();

    /**
     * Returns the number part of the VAT Number.
     *
     * @return string
     */
    public function getNumber();

    /**
     * Method to get the full VAT Number, with ISC country code.
     *
     * @return string
     */
    public function getVatNumber();
}
