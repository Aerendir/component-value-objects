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

use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Defines the minimum requirements of a Money object.
 *
 * {@inheritdoc}
 */
interface MoneyInterface extends ComplexValueObjectInterface
{
    /**
     * @param MoneyInterface $other
     *
     * @return static
     */
    public function add(MoneyInterface $other);

    /**
     * Returns the monetary value represented by this object.
     *
     * @return int
     */
    public function getAmount();

    /**
     * Returns the currency of the monetary value represented by this
     * object.
     *
     * @return \Money\Currency
     */
    public function getCurrency();
}
