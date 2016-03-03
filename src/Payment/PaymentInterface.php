<?php

/**
 *    @author      Aerendir <hello@aerendir.me>
 *    @copyright   Copyright (C) 2014 SerendipityHQ. All rights reserved.
 *    @license     SECRETED. No distribution, no copy, no derivative or any other activity or action that could disclose this text.
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
