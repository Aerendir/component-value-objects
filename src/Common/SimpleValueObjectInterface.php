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

namespace SerendipityHQ\Component\ValueObjects\Common;

/**
 * Defines the minimum requirements of a Simple Value Object.
 *
 * A Value Object is simple when it accepts only a single value.
 *
 * The value can be of any type supported by PHP.
 *
 * @see http://php.net/manual/en/types.comparisons.php
 */
interface SimpleValueObjectInterface extends ValueObjectInterface
{
    /**
     * Accepts a simple scalar value.
     *
     * @param mixed $value
     */
    public function __construct($value);
}
