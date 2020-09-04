<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Component\ValueObjects\Address;

use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Defines the minimum requisites of an Address object.
 *
 * {@inheritdoc}
 */
interface AddressInterface extends ComplexValueObjectInterface
{
    public const ADMINISTRATIVE_AREA = 'administrativeArea';
    public const COUNTRY_CODE        = 'countryCode';
    public const LOCALITY            = 'locality';
    public const DEPENDENT_LOCALITY  = 'dependentLocality';
    public const POSTAL_CODE         = 'postalCode';
    public const STREET              = 'street';
    public const EXTRA_LINE          = 'extraLine';

    public function getAdministrativeArea(): ?string;

    public function getCountryCode(): ?string;

    public function getDependentLocality(): ?string;

    public function getLocality(): ?string;

    public function getPostalCode(): ?string;

    public function getStreet(): ?string;

    public function getExtraLine(): ?string;
}
