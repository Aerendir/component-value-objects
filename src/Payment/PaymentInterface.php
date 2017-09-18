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
    public function getName();

    /**
     * Returns the payment status.
     *
     * @return string The payment status
     *
     * @since Alpha
     */
    public function getStatus();
}
