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

use SerendipityHQ\Component\ValueObjects\Common\SimpleValueObjectInterface;

/**
 * Defines the minimum requisites of a Tax Value Object.
 */
interface VatRateInterface extends SimpleValueObjectInterface
{
    public const COUNTRY_CODE = 'countryCode';
    public const PERCENTAGE   = 'percentage';

    /**
     * @param string $countryCode
     */
    public function __construct($countryCode);

    public function getCountryCode(): string;

    public function getPercentage(): float;
}
