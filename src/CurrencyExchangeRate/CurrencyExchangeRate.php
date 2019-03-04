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
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectTrait;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * {@inheritdoc}
 */
class CurrencyExchangeRate implements CurrencyExchangeRateInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    private $exchangeRate;
    private $exchangeRateDate;
    private $from;
    private $to;

    /**
     * Constructor.
     *
     * Required parameters are:
     *
     * - From: The Currency in which the amount is;
     * - To: The Currency in which the amount is converted/exchanged;
     * - ExchangeRate: The rate of the exchanging/conversion.
     *
     * @param array $values
     */
    public function __construct(array $values)
    {
        $this->traitConstruct($values);
    }

    /**
     * {@inheritdoc}
     */
    public function getExchangeRate(): float
    {
        return $this->exchangeRate;
    }

    /**
     * {@inheritdoc}
     */
    public function getExchangeRateDate(): \DateTime
    {
        return $this->exchangeRateDate;
    }

    /**
     * {@inheritdoc}
     */
    public function getFrom(): Currency
    {
        return $this->from;
    }

    /**
     * {@inheritdoc}
     */
    public function getTo(): Currency
    {
        return $this->to;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->__toString();
    }

    /**
     * Set the conversion rate of the currency.
     *
     * @param float $exchangeRate
     */
    protected function setExchangeRate(float $exchangeRate): void
    {
        if ( ! is_float($exchangeRate)) {
            throw new \InvalidArgumentException(sprintf('ExchangeRate has to be a float. %s given.', gettype($exchangeRate)));
        }

        $this->exchangeRate = $exchangeRate;
    }

    /**
     * Set the conversion rate of the currency.
     *
     * @param \DateTime $exchangeRateDate
     */
    protected function setExchangeRateDate(\DateTime $exchangeRateDate): void
    {
        $this->exchangeRateDate = $exchangeRateDate;
    }

    /**
     * The Currency in which the base amount is.
     *
     * @param Currency $from
     */
    protected function setFrom(Currency $from): void
    {
        $this->from = $from;
    }

    /**
     * The Currency in which the base amount has to be converted.
     *
     * @param Currency $to
     */
    protected function setTo(Currency $to): void
    {
        $this->to = $to;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        $string = '1 ' . $this->getFrom() . ' is equal to ' . $this->getExchangeRate() . ' ' . $this->getTo();
        if (null !== $this->getExchangeRateDate()) {
            $string .= ' on ' . $this->getExchangeRateDate()->format('Y-m-d H:i:s');
        }

        return $string;
    }
}
