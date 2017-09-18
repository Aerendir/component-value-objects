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

    /**
     * This represents the amount as a Human intends it: in its converted form.
     *
     * 00.1 {CURRENCY} = 10 units
     * 1.00 {CURRENCY} = 100 units
     *
     * @var
     */
    private $convertedAmount;

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

        // Only one between convertedAmount and amount can be set
        if (null !== $this->amount && null !== $this->convertedAmount) {
            throw new \InvalidArgumentException('You can pass only one between "amount" and "convertedAmount". Both passed.');
        }

        // If the converted amount were given...
        if (null !== $this->convertedAmount) {
            // Process it
            $currencies = new ISOCurrencies();

            $moneyParser = new DecimalMoneyParser($currencies);

            $this->valueObject = $moneyParser->parse($this->amount, $this->currency);
        }

        if (null !== $this->amount) {
            $this->valueObject = new \Money\Money($this->amount, new Currency($this->currency));
        }
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
     * @param $amount
     */
    protected function setConvertedAmount($amount)
    {
        $this->convertedAmount = $amount;
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
