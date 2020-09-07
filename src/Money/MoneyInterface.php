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

use Money\Currency;
use Money\Money;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Defines the minimum requirements of a Money object.
 *
 * {@inheritDoc}
 */
interface MoneyInterface extends ComplexValueObjectInterface
{
    public const BASE_AMOUNT  = 'baseAmount';
    public const HUMAN_AMOUNT = 'humanAmount';
    public const CURRENCY     = 'currency';

    /**
     * Returns the monetary value represented by this object.
     */
    public function getBaseAmount(): string;

    /**
     * Returns the Money value in the human format, without the currency symbol.
     */
    public function getHumanAmount(): string;

    /**
     * Returns the currency of the monetary value represented by this
     * object.
     */
    public function getCurrency(): Currency;

    /**
     * @return MoneyInterface
     */
    public function add(MoneyInterface $other): self;

    /**
     * @return MoneyInterface
     */
    public function subtract(MoneyInterface $other): self;

    /**
     * @param float|int|string $divisor
     */
    public function divide($divisor, int $roundingMode = Money::ROUND_HALF_UP): MoneyInterface;

    /**
     * @param float|int|string $multiplier
     */
    public function multiply($multiplier, int $roundingMode = Money::ROUND_HALF_UP): MoneyInterface;

    /**
     * @return array<string,float|int|string> [
     *                                        'currency'    => $this->getCurrency()->getCode(),
     *                                        'baseAmount'  => $this->getBaseAmount(),
     *                                        'humanAmount' => $this->getHumanAmount(),
     *                                        ];
     */
    public function __toArray(): array;
}
