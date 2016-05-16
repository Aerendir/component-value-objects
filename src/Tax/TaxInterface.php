<?php

/**
 *    @author      Aerendir <hello@aerendir.me>
 *    @copyright   Copyright (C) 2014 SerendipityHQ. All rights reserved.
 *    @license     SECRETED. No distribution, no copy, no derivative or any other activity or action that could disclose this text.
 */
namespace SerendipityHQ\Component\ValueObjects\Tax;

use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Money\Money;

/**
 * Defines the minimum requisites of a Tax Value Object.
 */
interface TaxInterface extends ComplexValueObjectInterface
{
    /**
     * Method to retrieve the code of the Tax on the remote system.
     *
     * @return string The unqie code of the tax on the Remote System.
     */
    public function getCode();

    /**
     * If the Tax is compounded returns true, false instead.
     *
     * @return bool
     */
    public function getCompound();

    /**
     * Method to retrieve the rate (percentage) of the tax.
     *
     * @return float The rate of the tax
     */
    public function getRate();

    /**
     * Method to get the amount of taxes paid.
     *
     * @return Money
     */
    public function getTaxAmount();
    
    /**
     * Method to retrieve the Remote title of the Tax stored in the object.
     *
     * @return string The title of the tax on the Remote System.
     */
    public function getTitle();
}
