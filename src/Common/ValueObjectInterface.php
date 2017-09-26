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
 * Defines the minimum requisites of Value Objects.
 */
interface ValueObjectInterface
{
    /**
     * The string representation of the object.
     *
     * This method can accept options to refine the string returned.
     *
     * @param array $options Options to use to format the output strinarray
     *
     * @return string
     */
    public function toString(array $options = []): string;

    /**
     * The string representation of the object.
     *
     * @return string
     */
    public function __toString();

    /**
     * Disable the __set magic method.
     *
     * Implement this way:
     *
     *     public function __set($field, $value)
     *     {
     *         // Body MUST BE EMPTY
     *     }
     *
     * @param string $field
     * @param mixed  $value
     */
    public function __set(string $field, $value): void;
}
