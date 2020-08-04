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

namespace SerendipityHQ\Component\ValueObjects\Money\Bridge\Symfony\Form\DataTransformer;

use Money\Exception\ParserException;
use SerendipityHQ\Component\ValueObjects\Money\Money;
use SerendipityHQ\Component\ValueObjects\Money\MoneyInterface;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * {@inheritdoc}
 */
final class MoneyTransformer implements DataTransformerInterface
{
    /** @var array<string,mixed> */
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
     * @return string|null
     */
    public function transform($money): ?string
    {
        if (null === $money) {
            return null;
        }

        return $money->getHumanAmount();
    }

    /**
     * Transforms a string email (email@example.com) to an Email object.
     *
     * @param float|int|Money|string|null $money
     *
     * @throws \InvalidArgumentException
     * @throws ParserException
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
