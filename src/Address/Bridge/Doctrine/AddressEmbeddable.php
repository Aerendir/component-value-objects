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
    public function setAdministrativeArea($administrativeArea)
    {
        parent::setAdministrativeArea($administrativeArea);
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode($countryCode)
    {
        parent::setCountryCode($countryCode);
    }

    /**
     * @param string $dependentLocality
     */
    public function setDependentLocality($dependentLocality)
    {
        parent::setDependentLocality($dependentLocality);
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        parent::setStreet($street);
    }

    /**
     * @param string $extraLine
     */
    public function setExtraLine($extraLine)
    {
        parent::setExtraLine($extraLine);
    }

    /**
     * @param string $locality
     */
    public function setLocality($locality)
    {
        parent::setLocality($locality);
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        parent::setPostalCode($postalCode);
    }
}
