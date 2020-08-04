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

namespace SerendipityHQ\Component\ValueObjects\Phone;

use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumber;
use libphonenumber\PhoneNumberUtil;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectTrait;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * Default implementation of a Phone object.
 */
final class Phone extends PhoneNumber implements PhoneInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    /** @var PhoneNumber|string */
    private $number;

    /** @var string */
    private $region;
    /**
     * @var string
     */
    private const KEEP_RAW_INPUT = 'keepRawInput';
    /**
     * @var string
     */
    private const NUMBER = 'number';

    /**
     * {@inheritdoc}
     *
     * @throws NumberParseException
     * @throws \InvalidArgumentException
     */
    public function __construct(array $values)
    {
        $this->traitConstruct($values);

        if (isset($values[self::KEEP_RAW_INPUT]) && false === \is_bool($values[self::KEEP_RAW_INPUT])) {
            throw new \InvalidArgumentException('The value of "keepRawInput" MUST be "bool".');
        }

        /** @var bool $keepRawInput */
        $keepRawInput = $values[self::KEEP_RAW_INPUT] ?? false;

        if (\is_string($values[self::NUMBER])) {
            $phoneUtil    = PhoneNumberUtil::getInstance();
            $this->number = $phoneUtil->parse($values[self::NUMBER], $this->region, null, $keepRawInput);
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
        if (\is_string($this->number)) {
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
            self::NUMBER      => $this->getNationalNumber(),
            'region'      => $this->getRegion(),
        ];
    }
}
