<?php

/**
 *    @author      Aerendir <hello@aerendir.me>
 *    @copyright   Copyright (C) 2014 SerendipityHQ. All rights reserved.
 *    @license     SECRETED. No distribution, no copy, no derivative or any other activity or action that could disclose this text.
 */
namespace SerendipityHQ\Component\ValueObjects\Payment;
use SerendipityHQ\Component\ValueObjects\Common\ValueObjectInterface;

/**
 * Defines the minimum requisites of a Payment Object.
 */
interface PaymentInterface extends ValueObjectInterface
{
    /**
     * Sets the payment name.
     *
     * @param string $name The payment name
     *
     * @return $this
     *
     * @since Alpha
     */
    public function setName($name);

    /**
     * Returns the payment name.
     *
     * @return string The payment name
     *
     * @since Alpha
     */
    public function getName();

    /**
     * Sets the payment status.
     *
     * @param string $status The actual status of the payment
     *
     * @return $this
     *
     * @since Alpha
     *
     * @todo Define a list of possible statuses
     */
    public function setStatus($status);

    /**
     * Returns the payment status.
     *
     * @return string The payment status
     *
     * @since Alpha
     */
    public function getStatus();
}
