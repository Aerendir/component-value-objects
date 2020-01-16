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

namespace SerendipityHQ\Component\ValueObjects\Phone;

use libphonenumber\PhoneNumber;
use libphonenumber\PhoneNumberUtil;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectTrait;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * Default implementation of a Phone object.
 */
class Phone extends PhoneNumber implements PhoneInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    /** @var PhoneNumber|string $number */
    private $number;

    /** @var string $region */
    private $region;

    /**
     * {@inheritdoc}
     *
     * @throws \libphonenumber\NumberParseException
     * @throws \InvalidArgumentException
     */
    public function __construct(array $values)
    {
        $this->traitConstruct($values);

        if (false === is_bool($values['keepRawInput'])) {
            throw new \InvalidArgumentException('The value of "keepRawInput" MUST be "bool".');
        }

        $keepRawInput = $values['keepRawInput'] ?? false;

        if (is_string($values['number'])) {
            $phoneUtil    = PhoneNumberUtil::getInstance();
            $this->number = $phoneUtil->parse($values['number'], $this->region, null, $keepRawInput);
        }

        if ($this->number instanceof PhoneNumber) {
            $this->mergeFrom($this->number);
        }

        $this->valueObject = $this->number;
    }

    /**
     * @throws \RuntimeException
     *
     * @return PhoneNumber
     */
    public function getNumber(): PhoneNumber
    {
        if (is_string($this->number)) {
            throw new \RuntimeException('The number is a string: something broken.');
        }

        return $this->number;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->__toString();
    }

    /**
     * @param Phone|string $number
     */
    protected function setNumber($number): void
    {
        $this->number = $number;
    }

    /**
     * @param string $region
     */
    protected function setRegion(string $region): void
    {
        $this->region = $region;
    }

    /**
     * @return array<string,int|string|null> [
     *                                       'countryCode' => $this->getCountryCode(),
     *                                       'number'      => $this->getNationalNumber(),
     *                                       'region'      => $this->getRegion(),
     *                                       ];
     */
    public function __toArray(): array
    {
        return [
            'countryCode' => $this->getCountryCode(),
            'number'      => $this->getNationalNumber(),
            'region'      => $this->getRegion(),
        ];
    }
}
