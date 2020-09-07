<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Component\ValueObjects\Ip;

use Darsyn\IP\Exception\InvalidIpAddressException;
use Darsyn\IP\Exception\IpException;
use Darsyn\IP\Exception\WrongVersionException;
use Darsyn\IP\Version\IPv4;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * {@inheritDoc}
 */
final class Ip implements IpInterface
{
    use DisableWritingMethodsTrait;

    /** @var IPv4 */
    private $valueObject;

    /**
     * {@inheritDoc}
     *
     * @param string $value
     *
     * @throws InvalidIpAddressException
     * @throws WrongVersionException
     *
     * @psalm-suppress DocblockTypeContradiction
     */
    public function __construct($value)
    {
        if (false === \is_string($value)) {
            throw new \InvalidArgumentException('The IP must be a string.');
        }

        $this->valueObject = IPv4::factory($value);
    }

    /**
     * {@inheritDoc}
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
     */
    public function __toString(): string
    {
        return $this->valueObject->getDotAddress();
    }
}
