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
        if (\is_array($address)) {
            $address = new AddressEmbeddable($address);
        }

        return $address;
    }
}
