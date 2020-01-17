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
 * Implements basic constructor for complex value objects.
 */
trait DisableWritingMethodsTrait
{
    /**
     * @see {@link ValueObjectInterface}
     *
     * @param string $field
     * @param mixed  $value
     */
    public function __set(string $field, $value): void
    {
    }
}
