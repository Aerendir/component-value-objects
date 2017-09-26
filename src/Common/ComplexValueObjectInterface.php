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

namespace SerendipityHQ\Component\ValueObjects\Common;

/**
 * Defines the minimum requirements of a Complex Value Object.
 *
 * A Value Object is complex when it requires more than one value to be fully populated.
 *
 * The values can be of any type supported by PHP.
 *
 * @see http://php.net/manual/en/types.comparisons.php
 */
interface ComplexValueObjectInterface extends ValueObjectInterface
{
    /**
     * Accepts an array containing the values to set in the object.
     *
     * @param array $values
     */
    public function __construct(array $values);

    /**
     * Get other data if present, null instead.
     *
     * @return array|null
     */
    public function getOtherData(): ?array;
}
