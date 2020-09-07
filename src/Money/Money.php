<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Component\ValueObjects\Money;

use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Exception\ParserException;
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
 * {@inheritDoc}
 */
final class Money implements MoneyInterface
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
     * @var int|string|null
     */
    private $baseAmount;

    /**
     * This represents the amount as a Human intends it: in its converted form.
     *
     * 00.1 {CURRENCY} = 10 units
     * 1.00 {CURRENCY} = 100 units
     *
     * @var float|int|string|null
     */
    private $humanAmount;

    /** @var Currency */
    private $currency;

    /** @var BaseMoney */
    private $valueObject;

    /**
     * {@inheritDoc}
     *
     * @throws \InvalidArgumentException
     * @throws ParserException
     */
    public function __construct(array $values = [])
    {
        // Set values in the object
        $this->traitConstruct($values);

        // Only one between baseAmount and humanAmount can be set
        if (null !== $this->baseAmount && null !== $this->humanAmount) {
            throw new \InvalidArgumentException('You can pass only one between "humanAmount" and "baseAmount". Both passed.');
        }

        // At least one between baseAmount and humanAmount MUST be set
        if (null === $this->baseAmount && null === $this->humanAmount) {
            throw new \InvalidArgumentException('You MUST pass one between "humanAmount" and "baseAmount". None passed.');
        }

        // If the base amount were given
        if (null !== $this->baseAmount) {
            $this->valueObject = new BaseMoney($this->baseAmount, $this->currency);
        }

        // If the human amount were given...
        if (null !== $this->humanAmount) {
            // Cast to string
            $this->humanAmount = (string) $this->humanAmount;

            // Replace "," with "."
            $this->humanAmount = \str_replace(',', '.', $this->humanAmount);

            // Process it
            $currencies = new ISOCurrencies();

            $moneyParser = new DecimalMoneyParser($currencies);

            $this->valueObject = $moneyParser->parse($this->humanAmount, $this->currency);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getBaseAmount(): string
    {
        return $this->valueObject->getAmount();
    }

    /**
     * {@inheritDoc}
     */
    public function getCurrency(): Currency
    {
        return $this->valueObject->getCurrency();
    }

    /**
     * {@inheritDoc}
     */
    public function getHumanAmount(): string
    {
        return $this->__toString();
    }

    /**
     * {@inheritDoc}
     *
     * @throws \InvalidArgumentException
     * @throws ParserException
     */
    public function add(MoneyInterface $other): MoneyInterface
    {
        $toAdd  = new BaseMoney($other->getBaseAmount(), $other->getCurrency());
        $result = $this->valueObject->add($toAdd);

        return new static([self::BASE_AMOUNT => $result->getAmount(), self::CURRENCY => $this->currency]);
    }

    /**
     * {@inheritDoc}
     *
     * @throws \InvalidArgumentException
     * @throws ParserException
     */
    public function subtract(MoneyInterface $other): MoneyInterface
    {
        $toAdd = new BaseMoney($other->getBaseAmount(), $other->getCurrency());

        $result = $this->valueObject->subtract($toAdd);

        return new static([self::BASE_AMOUNT => $result->getAmount(), self::CURRENCY => $this->currency]);
    }

    /**
     * {@inheritDoc}
     *
     * @throws \InvalidArgumentException
     * @throws ParserException
     */
    public function divide($divisor, int $roundingMode = BaseMoney::ROUND_HALF_UP): MoneyInterface
    {
        $result = $this->valueObject->divide($divisor, $roundingMode);

        return new static([self::BASE_AMOUNT => $result->getAmount(), self::CURRENCY => $this->currency]);
    }

    /**
     * {@inheritDoc}
     *
     * @throws \InvalidArgumentException
     * @throws ParserException
     */
    public function multiply($multiplier, int $roundingMode = BaseMoney::ROUND_HALF_UP): MoneyInterface
    {
        $result = $this->valueObject->multiply($multiplier, $roundingMode);

        return new static([self::BASE_AMOUNT => $result->getAmount(), self::CURRENCY => $this->currency]);
    }

    /**
     * {@inheritDoc}
     */
    public function toString(array $options = []): string
    {
        return $this->__toString();
    }

    /**
     * Sets the amount.
     */
    protected function setBaseAmount(int $baseAmount): void
    {
        $this->baseAmount = (string) $baseAmount;
    }

    /**
     * @param float|int|string $amount
     */
    protected function setHumanAmount($amount): void
    {
        $this->humanAmount = $amount;
    }

    /**
     * Sets the currency.
     *
     * @param Currency|string $currency
     */
    protected function setCurrency($currency): void
    {
        if ( ! $currency instanceof Currency) {
            $currency = new Currency(\strtoupper($currency));
        }

        $this->currency = $currency;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        $currencies = new ISOCurrencies();
        $formatter  = new DecimalMoneyFormatter($currencies);

        return $formatter->format($this->valueObject);
    }

    /**
     * {@inheritDoc}
     */
    public function __toArray(): array
    {
        return [
            self::CURRENCY     => $this->getCurrency()->getCode(),
            self::BASE_AMOUNT  => $this->getBaseAmount(),
            self::HUMAN_AMOUNT => $this->getHumanAmount(),
        ];
    }
}
