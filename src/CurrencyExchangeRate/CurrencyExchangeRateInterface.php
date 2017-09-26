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

namespace SerendipityHQ\Component\ValueObjects\CurrencyExchangeRate;

use Money\Currency;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Defines the minimum requisites of a Currency object.
 *
 * {@inheritdoc}
 */
interface CurrencyExchangeRateInterface extends ComplexValueObjectInterface
{
    /**
     * Get the conversion rate.
     *
     * This is not retrieved from some sources but set when creating the object.
     * So it may be not updated.
     *
     * @return float
     */
    public function getExchangeRate(): float;

    /**
     * The date on which the exchange rate were given.
     *
     * @return \DateTime
     */
    public function getExchangeRateDate(): \DateTime;

    /**
     * Get the base Currency the amount is in.
     *
     * @return Currency
     */
    public function getFrom(): Currency;

    /**
     * Get the Currency in which convert the amount.
     *
     * @return Currency
     */
    public function getTo(): Currency;
}
