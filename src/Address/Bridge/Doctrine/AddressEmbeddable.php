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
    public function setAdministrativeArea(string $administrativeArea): void
    {
        parent::setAdministrativeArea($administrativeArea);
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode(string $countryCode): void
    {
        parent::setCountryCode($countryCode);
    }

    /**
     * @param string $dependentLocality
     */
    public function setDependentLocality(string $dependentLocality): void
    {
        parent::setDependentLocality($dependentLocality);
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street): void
    {
        parent::setStreet($street);
    }

    /**
     * @param string $extraLine
     */
    public function setExtraLine(string $extraLine): void
    {
        parent::setExtraLine($extraLine);
    }

    /**
     * @param string $locality
     */
    public function setLocality(string $locality): void
    {
        parent::setLocality($locality);
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode(string $postalCode): void
    {
        parent::setPostalCode($postalCode);
    }
}
