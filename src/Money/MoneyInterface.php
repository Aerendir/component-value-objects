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

use Money\Currency;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Defines the minimum requirements of a Money object.
 *
 * {@inheritdoc}
 */
interface MoneyInterface extends ComplexValueObjectInterface
{
    /**
     * Returns the monetary value represented by this object.
     *
     * @return int
     */
    public function getBaseAmount(): int;

    /**
     * Returns the Money value in the human format, without the currency symbol.
     *
     * @return string
     */
    public function getHumanAmount(): string;

    /**
     * Returns the currency of the monetary value represented by this
     * object.
     *
     * @return Currency
     */
    public function getCurrency(): Currency;

    /**
     * @param MoneyInterface $other
     *
     * @return MoneyInterface
     */
    public function add(self $other): self;

    /**
     * @param MoneyInterface $other
     *
     * @return MoneyInterface
     */
    public function subtract(self $other): self;
}
