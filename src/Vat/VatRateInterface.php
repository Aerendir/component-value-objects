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

use SerendipityHQ\Component\ValueObjects\Common\SimpleValueObjectInterface;

/**
 * Defines the minimum requisites of a Tax Value Object.
 */
interface VatRateInterface extends SimpleValueObjectInterface
{
    /**
     * @param string $countryCode
     */
    public function __construct($countryCode);

    /**
     * @return string
     */
    public function getCountryCode(): string;

    /**
     * @return float
     */
    public function getPercentage(): float;
}
