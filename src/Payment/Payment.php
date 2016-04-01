<?php

/**
 *    @author      Aerendir <hello@aerendir.me>
 *    @copyright   Copyright (C) 2014 SerendipityHQ. All rights reserved.
 *    @license     SECRETED. No distribution, no copy, no derivative or any other activity or action that could disclose this text.
 */
namespace SerendipityHQ\Component\ValueObjects\Payment;

use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectTrait;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * Defines the minimum requisites of a Payment Object.
 *
 * @todo Define a list of possible statuses
 */
class Payment implements PaymentInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    /** @var string $name The payment name or title. */
    private $name = null;

    /** @var string $status Status of the payment: paid or not? Or in which status? */
    private $status = null;

    /**
     * @return string The payment name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string The payment status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $name The payment name
     */
    private function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $status The actual status of the payment
     */
    private function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->__toString();
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->name . ': ' . $this->status;
    }
}
