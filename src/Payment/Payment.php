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

    /** @var string $method The payment name or title. */
    private $method;

    /** @var string $status Status of the payment: paid or not? Or in which status? */
    private $status;

    /**
     * {@inheritdoc}
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * {@inheritdoc}
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->__toString();
    }

    /**
     * @param string $name The payment name
     */
    protected function setMethod(string $name): void
    {
        $this->method = $name;
    }

    /**
     * @param string $status The actual status of the payment
     */
    protected function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->method . ': ' . $this->status;
    }
}
