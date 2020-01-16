<?php

declare(strict_types=1);

/*
 * This file is part of PHP Value Objects.
 *
 * Copyright Adamo Aerendir Crespi 2015-2017.
 *
 * @author    Adamo Aerendir Crespi <hello@aerendir.me>
 * @copyright Copyright (C) 2015 - 2017 Aerendir. All rights reserved.
 * @license   MIT
 */

namespace SerendipityHQ\Component\ValueObjects\Money\Bridge\Symfony\Form\DataTransformer;

use SerendipityHQ\Component\ValueObjects\Money\Money;
use SerendipityHQ\Component\ValueObjects\Money\MoneyInterface;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * {@inheritdoc}
 */
class MoneyTransformer implements DataTransformerInterface
{
    /** @var array<string,mixed> $options */
    private $options;

    /**
     * @param array<string,mixed> $options = [
     *                                     'currency' => 'EUR'
     *                                     ]
     */
    public function __construct(array $options)
    {
        $this->options = $options;
    }

    /**
     * Transforms an object (Email) to a string (email@example.com).
     *
     * @param MoneyInterface|null $money
     *
     * @return string
     */
    public function transform($money): string
    {
        if (null === $money) {
            return '';
        }

        return $money->getHumanAmount();
    }

    /**
     * Transforms a string email (email@example.com) to an Email object.
     *
     * @param float|int|Money|string|null $money
     *
     * @throws \InvalidArgumentException
     * @throws \Money\Exception\ParserException
     *
     * @return MoneyInterface|null
     */
    public function reverseTransform($money): ? MoneyInterface
    {
        if (null !== $money) {
            $money = new Money(['humanAmount' => $money, 'currency' => $this->options['currency']]);
        }

        return $money;
    }
}
