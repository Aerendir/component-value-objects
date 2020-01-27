<?php

declare(strict_types=1);

/*
 * This file is part of PHP Value Objects.
 *
 * Copyright Adamo Aerendir Crespi 2015-2017.
 *
 * @author    Adamo Aerendir Crespi <hello@aerendir.me>
 * @copyright Copyright (C) 2015 - 2020 Aerendir. All rights reserved.
 * @license   MIT
 */

namespace SerendipityHQ\Component\ValueObjects\Address\Bridge\Symfony\Form\DataTransformer;

use SerendipityHQ\Component\ValueObjects\Address\Bridge\Doctrine\AddressEmbeddable;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * {@inheritdoc}
 */
final class AddressTransformer implements DataTransformerInterface
{
    /**
     * Transforms an AddressEmbeddable into an array.
     *
     * @param AddressEmbeddable|null $address
     *
     * @return array<string,string|null>|null
     */
    public function transform($address): ?array
    {
        if (null === $address) {
            return null;
        }

        return $address->_toArray();
    }

    /**
     * Creates the AddressEmbeddable from the array.
     *
     * @param AddressEmbeddable|array<string,string|null>|null $address
     *
     * @throws \InvalidArgumentException
     *
     * @return AddressEmbeddable|null
     */
    public function reverseTransform($address): ?AddressEmbeddable
    {
        if (is_array($address)) {
            $address = new AddressEmbeddable($address);
        }

        return $address;
    }
}
