<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
    /**
     * @var string
     */
    private const KEEP_RAW_INPUT = 'keepRawInput';
    /**
     * @var string
     */
    private const NUMBER = 'number';

    /** @var PhoneNumber|string */
    private $number;

    /** @var string|null */
    private $region;

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
            $this->number = $phoneUtil->parse($values[self::NUMBER], $this->getRegion(), null, $keepRawInput);
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
        if (null === $this->region) {
            throw new \InvalidArgumentException('The value of "region" cannot be "null".');
        }

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
            'countryCode'     => $this->getCountryCode(),
            self::NUMBER      => $this->getNationalNumber(),
            'region'          => $this->getRegion(),
        ];
    }
}
