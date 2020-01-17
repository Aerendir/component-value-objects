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

namespace SerendipityHQ\Component\ValueObjects\Address\Bridge\Doctrine;

use Doctrine\ORM\Mapping as ORM;
use SerendipityHQ\Component\ValueObjects\Address\Address;

/**
 * {@inheritdoc}
 *
 * @ORM\Embeddable
 */
class AddressEmbeddable extends Address
{
    /**
     * @param string $administrativeArea
     */
    protected function setAdministrativeArea(string $administrativeArea): void
    {
        parent::setAdministrativeArea($administrativeArea);
    }

    /**
     * @param string $countryCode
     */
    protected function setCountryCode(string $countryCode): void
    {
        parent::setCountryCode($countryCode);
    }

    /**
     * @param string $dependentLocality
     */
    protected function setDependentLocality(string $dependentLocality): void
    {
        parent::setDependentLocality($dependentLocality);
    }

    /**
     * @param string $street
     */
    protected function setStreet(string $street): void
    {
        parent::setStreet($street);
    }

    /**
     * @param string $extraLine
     */
    protected function setExtraLine(string $extraLine): void
    {
        parent::setExtraLine($extraLine);
    }

    /**
     * @param string $locality
     */
    protected function setLocality(string $locality): void
    {
        parent::setLocality($locality);
    }

    /**
     * @param string $postalCode
     */
    protected function setPostalCode(string $postalCode): void
    {
        parent::setPostalCode($postalCode);
    }
}
