<?php

/*
 * This file is part of PHP Value Objects.
 *
 * Copyright Adamo Aerendir Crespi 2015-2017.
 *
 * @author    Adamo Aerendir Crespi <hello@aerendir.me>
 * @copyright Copyright (C) 2015 - 2020 Aerendir. All rights reserved.
 * @license   MIT
 */

namespace SerendipityHQ\Component\ValueObjects\Ip;

use Darsyn\IP\Exception\InvalidIpAddressException;
use Darsyn\IP\Exception\IpException;
use Darsyn\IP\Exception\WrongVersionException;
use Darsyn\IP\Version\IPv4;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * {@inheritdoc}
 */
final class Ip implements IpInterface
{
    use DisableWritingMethodsTrait;

    /** @var IPv4 */
    private $valueObject;

    /**
     * {@inheritdoc}
     *
     * @throws InvalidIpAddressException
     * @throws WrongVersionException
     * @psalm-suppress MixedArgument
     */
    public function __construct($value)
    {
        $this->valueObject = IPv4::factory($value);
    }

    /**
     * {@inheritdoc}
     *
     * @throws IpException
     * @throws WrongVersionException
     */
    public function toString(array $options = []): string
    {
        return $this->__toString();
    }

    /**
     * @throws IpException
     * @throws WrongVersionException
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->valueObject->getDotAddress();
    }
}
