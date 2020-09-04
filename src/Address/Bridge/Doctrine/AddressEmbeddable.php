<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
     * Returns the full array, with null values, too.
     * This array is then used in the Form type.
     *
     * @return array<string,string|null>
     */
    public function _toArray(): array
    {
        return [
            'street'             => $this->getStreet(),
            'extraLine'          => $this->getExtraLine(),
            'postalCode'         => $this->getPostalCode(),
            'locality'           => $this->getLocality(),
            'dependentLocality'  => $this->getDependentLocality(),
            'administrativeArea' => $this->getAdministrativeArea(),
            'countryCode'        => $this->getCountryCode(),
        ];
    }

    protected function setAdministrativeArea(?string $administrativeArea): void
    {
        if (null !== $administrativeArea) {
            parent::setAdministrativeArea($administrativeArea);
        }
    }

    protected function setCountryCode(?string $countryCode): void
    {
        if (null !== $countryCode) {
            parent::setCountryCode($countryCode);
        }
    }

    protected function setDependentLocality(?string $dependentLocality): void
    {
        if (null !== $dependentLocality) {
            parent::setDependentLocality($dependentLocality);
        }
    }

    protected function setStreet(?string $street): void
    {
        if (null !== $street) {
            parent::setStreet($street);
        }
    }

    protected function setExtraLine(?string $extraLine): void
    {
        if (null !== $extraLine) {
            parent::setExtraLine($extraLine);
        }
    }

    protected function setLocality(?string $locality): void
    {
        if (null !== $locality) {
            parent::setLocality($locality);
        }
    }

    protected function setPostalCode(?string $postalCode): void
    {
        if (null !== $postalCode) {
            parent::setPostalCode($postalCode);
        }
    }
}
