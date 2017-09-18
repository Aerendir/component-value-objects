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
    private $name;

    /** @var string $status Status of the payment: paid or not? Or in which status? */
    private $status;

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
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->__toString();
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
    public function __toString()
    {
        return $this->name . ': ' . $this->status;
    }
}
