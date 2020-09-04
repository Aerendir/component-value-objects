<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
     */
    public function __construct($value);
}
