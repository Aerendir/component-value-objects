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
    public function getAdministrativeArea(): ?string
    {
        return $this->administrativeArea;
    }

    /**
     * {@inheritdoc}
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getDependentLocality(): ?string
    {
        return $this->dependentLocality;
    }

    /**
     * {@inheritdoc}
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * {@inheritdoc}
     */
    public function getExtraLine(): ?string
    {
        return $this->extraLine;
    }

    /**
     * {@inheritdoc}
     */
    public function getLocality(): ?string
    {
        return $this->locality;
    }

    /**
     * {@inheritdoc}
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \RuntimeException
     */
    public function toString(array $options = []): string
    {
        // @todo Add formatters for the address. @see https://github.com/commerceguys/addressing
        throw new \RuntimeException('Method not implemented. See the @todo in the code.');
    }

    /**
     * @param string $administrativeArea
     */
    protected function setAdministrativeArea(string $administrativeArea): void
    {
        $this->administrativeArea = $administrativeArea;
    }

    /**
     * @param string $countryCode
     */
    protected function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @param string $dependentLocality
     */
    protected function setDependentLocality(string $dependentLocality): void
    {
        $this->dependentLocality = $dependentLocality;
    }

    /**
     * @param string $street
     */
    protected function setStreet(string $street): void
    {
        $this->street = $street;
    }

    /**
     * @param string $extraLine
     */
    protected function setExtraLine(string $extraLine): void
    {
        $this->extraLine = $extraLine;
    }

    /**
     * @param string $locality
     */
    protected function setLocality(string $locality): void
    {
        $this->locality = $locality;
    }

    /**
     * @param string $postalCode
     */
    protected function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \RuntimeException
     */
    public function __toString(): string
    {
        return $this->toString();
    }
}
