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

namespace SerendipityHQ\Component\ValueObjects\Ip;

use Darsyn\IP\IP as BaseIp;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * {@inheritdoc}
 */
class Ip extends BaseIp implements IpInterface
{
    use DisableWritingMethodsTrait;

    /**
     * {@inheritdoc}
     */
    public function __construct($value)
    {
        if ( ! self::validate($value)) {
            throw new \InvalidArgumentException(sprintf('The passed value "%s" does not look like an IP.', $value));
        }

        parent::__construct($value);
    }

    /**
     * Validate IP Address.
     *
     * This is only a static helper method, it is not used internally.
     *
     * Method taken from the version 2.0.2 of the Darsyn\Ip value object.
     *
     * @see https://github.com/darsyn/ip/blob/2.0.2/src/IP.php#L30-L46
     *
     * @param string $ip
     *
     * @return bool
     */
    public static function validate($ip)
    {
        // Check that the IP address supplied is either 16 bytes long (binary notation) or validates as IPv4 or IPv6
        // notation via PHP's in-built validator.
        return is_string($ip) && (16 === strlen($ip) || filter_var($ip, FILTER_VALIDATE_IP));
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->__toString();
    }
}
