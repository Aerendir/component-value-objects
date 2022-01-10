<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Component\ValueObjects\CurrencyExchangeRate;

use Money\Currency;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Defines the minimum requisites of a Currency object.
 *
 * {@inheritDoc}
 */
interface CurrencyExchangeRateInterface extends ComplexValueObjectInterface
{
    public const EXCHANGE_RATE      = 'exchangeRate';

    public const EXCHANGE_RATE_DATE = 'exchangeRateDate';

    public const FROM               = 'from';

    public const TO                 = 'to';

    /**
     * Get the conversion rate.
     *
     * This is not retrieved from some sources but set when creating the object.
     * So it may be not updated.
     */
    public function getExchangeRate(): float;

    /**
     * The date on which the exchange rate were given.
     */
    public function getExchangeRateDate(): ?\DateTimeInterface;

    /**
     * Get the base Currency the amount is in.
     */
    public function getFrom(): Currency;

    /**
     * Get the Currency in which convert the amount.
     */
    public function getTo(): Currency;
}
