<?php

/**
 *    @author      Aerendir <hello@aerendir.me>
 *    @copyright   Copyright (C) 2014 SerendipityHQ. All rights reserved.
 *    @license     SECRETED. No distribution, no copy, no derivative or any other activity or action that could disclose this text.
 */
namespace SerendipityHQ\Component\ValueObjects\Tax;

use SerendipityHQ\Component\ValueObjects\Money\Money;

/**
 * Defines the minimum requisites of a Tax Value Object.
 */
interface TaxInterface
{
    /**
     * Method to get the amount of taxes paid.
     *
     * @return Money
     */
    public function getAmount();

    /**
     * Method to retrieve the code of the Tax on the remote system.
     *
     * @return string The unqie code of the tax on the Remote System.
     */
    public function getCode();

    /**
     * Method to get the compound amount of taxes.
     *
     * @return Money
     */
    public function getCompound();

    /**
     * Method to retrieve the rate (percentage) of the tax.
     *
     * @return float The rate of the tax
     */
    public function getRate();

    /**
     * Method to retrieve the Remote title of the Tax stored in the object.
     *
     * @return string The title of the tax on the Remote System.
     */
    public function getTitle();

    /**
     * Method to set the paid amount of taxes.
     *
     * @param Money $amount
     */
    public function setAmount(Money $amount);

    /**
     * Sets the code of the Tax on the remote system.
     *
     * @param string $code Is a string that identifies the Tax on the Remote System
     */
    public function setCode($code);

    /**
     * Method to set the compound amount of taxes.
     *
     * @param Money $compound
     */
    public function setCompound(Money $compound);

    /**
     * Method to set the rate of the tax.
     *
     * @param float $rate The rate of the tax
     */
    public function setRate($rate);
    /**
     * Sets the title of the Tax on the remote system.
     *
     * @param string $title The title of the Tax on the Remote system
     */
    public function setTitle($title);
}
