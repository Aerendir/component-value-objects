<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Component\ValueObjects\Payment;

use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Defines the minimum requisites of a Payment Object.
 *
 * {@inheritdoc}
 *
 * @todo Define a list of possible statuses
 */
interface PaymentInterface extends ComplexValueObjectInterface
{
    /**
     * Returns the payment name.
     *
     * @return string The payment name
     *
     * @since Alpha
     */
    public function getMethod(): string;

    /**
     * Returns the payment status.
     *
     * @return string|null The payment status
     *
     * @since Alpha
     */
    public function getStatus(): ?string;
}
