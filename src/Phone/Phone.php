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

    private $number;
    private $region;

    /**
     * {@inheritdoc}
     */
    public function __construct(array $values)
    {
        $this->traitConstruct($values);

        $keepRawInput = isset($values['keepRawInput']) ? $values['keepRawInput'] : false;

        if (is_string($this->number)) {
            $phoneUtil    = PhoneNumberUtil::getInstance();
            $this->number = $phoneUtil->parse($this->number, $this->region, null, $keepRawInput);
        }

        if ($this->number instanceof PhoneNumber) {
            $this->mergeFrom($this->number);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->__toString();
    }

    /**
     * @param Phone|string $number
     */
    private function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @param string $region
     */
    private function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return parent::__toString();
    }
}
