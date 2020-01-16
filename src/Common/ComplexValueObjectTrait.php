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
 * Implements basic constructor for complex value objects.
 */
trait ComplexValueObjectTrait
{
    /** @var mixed $valueObject */
    private $valueObject;

    /** @var array<int|string,mixed> Contains the data for which a property were not found */
    private $otherData = [];

    /**
     * Accepts an array containing the values to set in the object.
     *
     * @param array<string,mixed> $values
     * @psalm-suppress MixedAssignment
     */
    public function __construct(array $values)
    {
        foreach ($values as $property => $value) {
            $setter = 'set' . ucfirst($property);
            $adder  = 'add' . ucfirst($property);

            if (true === method_exists($this, $setter)) {
                $this->$setter($value);
                unset($values[$property]);
            }

            if (true === method_exists($this, $adder)) {
                $this->$adder($value);
                unset($values[$property]);
            }
        }

        // Add remaining value to $otherData
        $this->otherData = $values;
    }

    /**
     * Get other data if present, null instead.
     *
     * @return array<int|string,mixed>|null
     */
    public function getOtherData(): ?array
    {
        return (true === empty($this->otherData)) ? null : $this->otherData;
    }

    /**
     * Returns the built value object or null if no one is present.
     *
     * @return mixed
     */
    public function getValueObject()
    {
        return $this->valueObject;
    }
}
