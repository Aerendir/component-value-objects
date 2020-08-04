<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
     * @return string|null The unique code of the tax on the System
     */
    public function getCode(): ? string;

    /**
     * Method to retrieve the rate (percentage) of the tax.
     *
     * @return float|null The rate of the tax
     */
    public function getRate(): ? float;

    /**
     * Method to get the amount of taxes paid.
     *
     * @return MoneyInterface|null
     */
    public function getAmount(): ? MoneyInterface;

    /**
     * Method to retrieve the Remote title of the Tax stored in the object.
     *
     * @return string|null The title of the tax on the Remote System
     */
    public function getTitle(): ? string;

    /**
     * If the Tax is compounded returns true, false instead.
     *
     * @return bool|null
     */
    public function isCompound(): ? bool;
}
