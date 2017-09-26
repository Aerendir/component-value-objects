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

namespace SerendipityHQ\Component\ValueObjects\Email;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * {@inheritdoc}
 */
class Email implements EmailInterface
{
    use DisableWritingMethodsTrait;

    /** @var string $email */
    private $email;

    /** @var string $mailBox */
    private $mailBox;

    /** @var string $host */
    private $host;

    /**
     * {@inheritdoc}
     *
     * @param string $value The email to set in the object
     */
    public function __construct($value)
    {
        $validator = new EmailValidator();

        if ( ! $validator->isValid($value, new RFCValidation())) {
            throw new \InvalidArgumentException(sprintf('The passed value "%s" does not look like an email.', $value));
        }

        $this->email = $value;

        [$this->mailBox, $this->host] = explode('@', $this->email);
    }

    /**
     * {@inheritdoc}
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * {@inheritdoc}
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * {@inheritdoc}
     */
    public function getMailBox(): string
    {
        return $this->mailBox;
    }

    /**
     * {@inheritdoc}
     */
    public function changeMailBox($newMailbox): EmailInterface
    {
        $copy          = clone $this;
        $copy->mailBox = $newMailbox;
        $copy->email   = $copy->mailBox . '@' . $copy->host;

        return $copy;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->__toString();
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return sprintf('%s@%s', $this->mailBox, $this->host);
    }
}
