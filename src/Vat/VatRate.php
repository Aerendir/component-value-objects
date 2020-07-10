<?php

/*
 * This file is part of PHP Value Objects.
 *
 * Copyright Adamo Aerendir Crespi 2015-2017.
 *
 * @author    Adamo Aerendir Crespi <hello@aerendir.me>
 * @copyright Copyright (C) 2015 - 2020 Aerendir. All rights reserved.
 * @license   MIT
 */

namespace SerendipityHQ\Component\ValueObjects\Vat;

use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * Default implementation of a Tax Value object.
 */
final class VatRate implements VatRateInterface
{
    use DisableWritingMethodsTrait;

    /** @var float[] */
    private const COUNTRIES = [
        'IT' => 22.0000,
    ];

    /** @var string The country for which this object represents the VAT */
    private $country;

    /**
     * {@inheritdoc}
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($countryCode)
    {
        if (false === array_key_exists($countryCode, self::COUNTRIES)) {
            throw new \InvalidArgumentException("The passed Country isn't supported by this value object");
        }

        $this->country = $countryCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getCountryCode(): string
    {
        return $this->country;
    }

    /**
     * {@inheritdoc}
     */
    public function getPercentage(): float
    {
        return self::COUNTRIES[$this->country];
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
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
