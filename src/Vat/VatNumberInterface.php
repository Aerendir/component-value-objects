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

namespace SerendipityHQ\Component\ValueObjects\Vat;

use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Defines the minimum requisites of a VatNumber Value Object.
 */
interface VatNumberInterface extends ComplexValueObjectInterface
{
    public const COUNTRY_CODE = 'countryCode';
    public const NUMBER       = 'number';
    public const VAT_NUMBER   = 'vatNumber';

    /**
     * Method to retrieve the country code in ISO format of the VatNumber.
     *
     * @return string The country code of the VAT Number
     */
    public function getCountryCode(): string;

    /**
     * Returns the number part of the VAT Number.
     */
    public function getNumber(): string;

    /**
     * Method to get the full VAT Number, with ISC country code.
     */
    public function getVatNumber(): string;
}
