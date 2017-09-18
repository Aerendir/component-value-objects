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

namespace SerendipityHQ\Component\ValueObjects\Money;

use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\DecimalMoneyFormatter;
use Money\Money as BaseMoney;
use Money\Parser\DecimalMoneyParser;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectTrait;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * The class doesn't extend the base money object has it has private properties and methods that make difficult the
 * integration.
 *
 * So the base money object is stored in a proprty in this class and this class operates like a simple wrapper.
 *
 * {@inheritdoc}
 */
class Money implements MoneyInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    /**
     * This represents the amount as Money intends it: in its base units.
     *
     * 10 = 00.1 {CURRENCY}
     * 100 = 1.00 {CURRENCY}
     *
     * @var int
     */
    private $amount;

    /** @var Currency */
    private $currency;

    /** @var BaseMoney */
    private $valueObject;

    /**
     * {@inheritdoc}
     */
    public function __construct(array $values = [])
    {
        // Set values in the object
        $this->traitConstruct($values);

        /**
         * if (is_string($this->amount)) {
         * $this->valueObject = BaseMoney::fromString($this->amount, $this->currency);
         * } elseif (is_float($this->amount)) {
         * $this->valueObject = BaseMoney::fromString((string) $this->amount, $this->currency);
         * } elseif (is_int($this->amount)) {
         * // Maybe is int: leave to BaseMoney other checks
         * $this->valueObject = new BaseMoney($this->amount, $this->currency);
         * } else {
         * throw new \InvalidArgumentException(sprintf('The amount has to be a string or a float (ex.: 35.5 Euros) or'
         * . ' an int in the base form (355 = 35.5 Euros). %s given.', gettype($this->amount)));
         * }.
         */
        $currencies = new ISOCurrencies();

        $moneyParser = new DecimalMoneyParser($currencies);

        $this->valueObject = $moneyParser->parse($this->amount, $this->currency);
    }

    /**
     * {@inheritdoc}
     */
    public function add(MoneyInterface $other)
    {
        $toAdd = new BaseMoney($other->getAmount(), $other->getCurrency());

        $result = $this->valueObject->add($toAdd);

        return new static(['amount' => $result->getAmount(), 'currency' => $this->currency]);
    }

    /**
     * {@inheritdoc}
     */
    public function getAmount()
    {
        return $this->valueObject->getAmount();
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrency()
    {
        return $this->valueObject->getCurrency();
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->__toString();
    }

    /**
     * Sets the amount.
     *
     * @param int $amount
     */
    protected function setAmount($amount)
    {
        $this->amount = (string) $amount;
    }

    /**
     * Sets the currency.
     *
     * @param \Money\Currency|string $currency
     */
    protected function setCurrency($currency)
    {
        if ($currency instanceof Currency) {
            $currency = $currency->getCode();
        }

        $this->currency = $currency;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        $currencies = new ISOCurrencies();
        $formatter  = new DecimalMoneyFormatter($currencies);

        return $formatter->format($this->valueObject);
    }
}
