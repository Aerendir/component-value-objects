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

namespace SerendipityHQ\Component\ValueObjects\Vat;

use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * Default implementation of a Tax Value object.
 */
class VatRate implements VatRateInterface
{
    use DisableWritingMethodsTrait;

    /**
     * @var array
     */
    private $countries = [
        'IT' => 22.0000,
    ];

    /** @var string $country The country for which this object represents the VAT */
    private $country;

    /**
     * {@inheritdoc}
     */
    public function __construct($countryCode)
    {
        if (false === array_key_exists($countryCode, $this->countries)) {
            throw new \InvalidArgumentException('The passed Country isn\'t supported by this value object');
        }

        $this->country = $countryCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getCountryCode()
    {
        return $this->country;
    }

    /**
     * {@inheritdoc}
     */
    public function getPercentage()
    {
        return $this->countries[$this->country];
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->__toString();
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return (string) $this->getPercentage();
    }
}
