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

namespace SerendipityHQ\Component\ValueObjects\Tax;

use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Money\MoneyInterface;

/**
 * Defines the minimum requisites of a Tax Value Object.
 */
interface TaxInterface extends ComplexValueObjectInterface
{
    /**
     * Method to retrieve the code of the Tax on the system.
     *
     * @return string The unique code of the tax on the System
     */
    public function getCode(): string;

    /**
     * Method to retrieve the rate (percentage) of the tax.
     *
     * @return float The rate of the tax
     */
    public function getRate(): float;

    /**
     * Method to get the amount of taxes paid.
     *
     * @return MoneyInterface
     */
    public function getAmount(): MoneyInterface;

    /**
     * Method to retrieve the Remote title of the Tax stored in the object.
     *
     * @return string The title of the tax on the Remote System
     */
    public function getTitle(): string;

    /**
     * If the Tax is compounded returns true, false instead.
     *
     * @return bool
     */
    public function isCompound(): bool;
}
