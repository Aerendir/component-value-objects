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
use Safe\Exceptions\StringsException;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectTrait;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * {@inheritDoc}
 */
final class CurrencyExchangeRate implements CurrencyExchangeRateInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    /** @var float */
    private $exchangeRate;

    /** @var \DateTime|null */
    private $exchangeRateDate;

    /** @var Currency */
    private $from;

    /** @var Currency */
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
     * @param array<string,Currency|\DateTime|float|int> $values = [
     *                                                           'From' => new Currency(''),
     *                                                           'To' => new Currency(''),
     *                                                           'ExchangeRate' => 1.1,
     *                                                           'ExchangeRateDate' => new \DateTime(),
     *                                                           ]
     */
    public function __construct(array $values)
    {
        $this->traitConstruct($values);
    }

    /**
     * {@inheritDoc}
     */
    public function getExchangeRate(): float
    {
        return $this->exchangeRate;
    }

    /**
     * {@inheritDoc}
     */
    public function getExchangeRateDate(): ? \DateTime
    {
        return $this->exchangeRateDate;
    }

    /**
     * {@inheritDoc}
     */
    public function getFrom(): Currency
    {
        return $this->from;
    }

    /**
     * {@inheritDoc}
     */
    public function getTo(): Currency
    {
        return $this->to;
    }

    /**
     * {@inheritDoc}
     */
    public function toString(array $options = []): string
    {
        return $this->__toString();
    }

    /**
     * Set the conversion rate of the currency.
     *
     * @throws StringsException
     */
    protected function setExchangeRate(float $exchangeRate): void
    {
        $this->exchangeRate = $exchangeRate;
    }

    /**
     * Set the conversion rate of the currency.
     */
    protected function setExchangeRateDate(\DateTimeInterface $exchangeRateDate): void
    {
        $this->exchangeRateDate = $exchangeRateDate;
    }

    /**
     * The Currency in which the base amount is.
     */
    protected function setFrom(Currency $from): void
    {
        $this->from = $from;
    }

    /**
     * The Currency in which the base amount has to be converted.
     */
    protected function setTo(Currency $to): void
    {
        $this->to = $to;
    }

    /**
     * {@inheritDoc}
     *
     * @psalm-suppress InvalidOperand
     */
    public function __toString(): string
    {
        $string       = '1 ' . $this->getFrom() . ' is equal to ' . $this->getExchangeRate() . ' ' . $this->getTo();
        $exchangeRate = $this->getExchangeRateDate();
        if (null !== $exchangeRate) {
            $string .= ' on ' . $exchangeRate->format('Y-m-d H:i:s');
        }

        return $string;
    }
}
