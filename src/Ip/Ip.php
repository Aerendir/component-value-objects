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

use Darsyn\IP\Version\IPv4;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * {@inheritdoc}
 */
class Ip implements IpInterface
{
    use DisableWritingMethodsTrait;

    /** @var IPv4 $valueObject */
    private $valueObject;

    /**
     * {@inheritdoc}
     *
     * @throws \Darsyn\IP\Exception\InvalidIpAddressException
     * @throws \Darsyn\IP\Exception\WrongVersionException
     * @psalm-suppress MixedArgument
     */
    public function __construct($value)
    {
        $this->valueObject = IPv4::factory($value);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Darsyn\IP\Exception\IpException
     * @throws \Darsyn\IP\Exception\WrongVersionException
     */
    public function toString(array $options = []): string
    {
        return $this->__toString();
    }

    /**
     * @throws \Darsyn\IP\Exception\IpException
     * @throws \Darsyn\IP\Exception\WrongVersionException
     *
     * @return string
     */
    public function __toString()
    {
        return $this->valueObject->getDotAddress();
    }
}
