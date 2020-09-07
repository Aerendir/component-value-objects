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

use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Defines the minimum requisites of a Phone Object.
 *
 * {@inheritDoc}
 */
interface PhoneInterface extends ComplexValueObjectInterface
{
    public const CONFIG_KEEP_RAW_INPUT = 'keepRawInput';
    public const COUNTRY_CODE          = 'countryCode';
    public const NUMBER                = 'number';
    public const REGION                = 'region';
}
