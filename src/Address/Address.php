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

use Doctrine\ORM\Mapping as ORM;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectTrait;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * An Address value object.
 *
 * This Value Object use commerceguys/addressing library
 *
 * @see https://github.com/commerceguys/addressing
 *
 * Other useful libraries:
 * - https://github.com/black-project/Address
 * - https://github.com/adamlc/address-format
 *
 * {@inheritdoc}
 *
 * @ORM\Embeddable
 */
class Address implements AddressInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    /**
     * The two-letter country code.
     *
     * @var string
     *
     * @ORM\Column(name="country_code", type="string", nullable=true)
     */
    protected $countryCode;

    /**
     * The top-level administrative subdivision of the country.
     *
     * @var string
     *
     * @ORM\Column(name="administrative_area", type="string", nullable=true)
     */
    protected $administrativeArea;

    /**
     * The locality (i.e. city).
     *
     * @var string
     *
     * @ORM\Column(name="locality", type="string", nullable=true)
     */
    protected $locality;

    /**
     * The dependent locality (i.e. neighbourhood).
     *
     * @var string
     *
     * @ORM\Column(name="dependent_locality", type="string", nullable=true)
     */
    protected $dependentLocality;

    /**
     * The postal code.
     *
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string", nullable=true)
     */
    protected $postalCode;

    /**
     * The first line of the address block.
     *
     * @var string
     *
     * @ORM\Column(name="street", type="string", nullable=true)
     */
    protected $street;

    /**
     * The second line of the address block.
     *
     * @var string
     *
     * @ORM\Column(name="extra_line", type="string", nullable=true)
     */
    protected $extraLine;

    /**
     * {@inheritdoc}
     */
    public function __construct(array $values)
    {
        // Set values in the object
        $this->traitConstruct($values);
    }

    /**
     * {@inheritdoc}
     */
    public function getAdministrativeArea()
    {
        return $this->administrativeArea;
    }

    /**
     * {@inheritdoc}
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getDependentLocality()
    {
        return $this->dependentLocality;
    }

    /**
     * {@inheritdoc}
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * {@inheritdoc}
     */
    public function getExtraLine()
    {
        return $this->extraLine;
    }

    /**
     * {@inheritdoc}
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * {@inheritdoc}
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        // @todo Add formatters for the address. @see https://github.com/commerceguys/addressing
        throw new \RuntimeException('Method not implemented. See the @todo in the code.');
    }

    /**
     * @param string $administrativeArea
     */
    protected function setAdministrativeArea($administrativeArea)
    {
        $this->administrativeArea = $administrativeArea;
    }

    /**
     * @param string $countryCode
     */
    protected function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @param string $dependentLocality
     */
    protected function setDependentLocality($dependentLocality)
    {
        $this->dependentLocality = $dependentLocality;
    }

    /**
     * @param string $street
     */
    protected function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @param string $extraLine
     */
    protected function setExtraLine($extraLine)
    {
        $this->extraLine = $extraLine;
    }

    /**
     * @param string $locality
     */
    protected function setLocality($locality)
    {
        $this->locality = $locality;
    }

    /**
     * @param string $postalCode
     */
    protected function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->toString();
    }
}
