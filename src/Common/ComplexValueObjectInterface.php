<?php

declare(strict_types=1);

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
     * @param array<string, mixed> $values
     */
    public function __construct(array $values);

    /**
     * Returns the built value object or null if no one is present.
     */
    public function getValueObject();

    /**
     * Get other data if present, null instead.
     *
     * @return array<int|string,mixed>|null
     */
    public function getOtherData(): ?array;
}
