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

namespace SerendipityHQ\Component\ValueObjects\Address;

use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Defines the minimum requisites of an Address object.
 *
 * {@inheritdoc}
 */
interface AddressInterface extends ComplexValueObjectInterface
{
    /**
     * @return string
     */
    public function getAdministrativeArea(): ?string;

    /**
     * @return string
     */
    public function getCountryCode(): ?string;

    /**
     * @return string
     */
    public function getDependentLocality(): ?string;

    /**
     * @return string
     */
    public function getLocality(): ?string;

    /**
     * @return string
     */
    public function getPostalCode(): ?string;

    /**
     * @return string
     */
    public function getStreet(): ?string;

    /**
     * @return string
     */
    public function getExtraLine(): ?string;
}
