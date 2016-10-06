<?php

/**
 *    @author      Aerendir <hello@aerendir.me>
 *    @copyright   Copyright (C) 2014 SerendipityHQ. All rights reserved
 *    @license     SECRETED. No distribution, no copy, no derivative or any other activity or action that could disclose this text
 */
namespace SerendipityHQ\Component\ValueObjects\Vat;

use SerendipityHQ\Component\ValueObjects\Common\SimpleValueObjectInterface;

/**
 * Defines the minimum requisites of a Tax Value Object.
 */
interface VatInterface extends SimpleValueObjectInterface
{
    /**
     * @param string $countryCode
     */
    public function __construct($countryCode);

    /**
     * @return string
     */
    public function getCountryCode();

    /**
     * @return float
     */
    public function getPercentage();
}
