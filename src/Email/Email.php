<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Component\ValueObjects\Email;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;
use Safe\Exceptions\StringsException;
use function Safe\sprintf;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * {@inheritdoc}
 */
final class Email implements EmailInterface
{
    use DisableWritingMethodsTrait;

    /** @var string */
    private $email;

    /** @var string */
    private $mailBox;

    /** @var string */
    private $host;

    /**
     * {@inheritdoc}
     *
     * @param string $value The email to set in the object
     *
     * @throws \InvalidArgumentException
     * @throws StringsException
     */
    public function __construct($value)
    {
        $validator = new EmailValidator();

        if ( ! $validator->isValid($value, new RFCValidation())) {
            throw new \InvalidArgumentException(sprintf('The passed value "%s" does not look like an email.', $value));
        }

        $this->email = $value;

        [$this->mailBox, $this->host] = \explode('@', $this->email);
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
    public function changeMailBox(string $newMailbox): EmailInterface
    {
        $copy          = clone $this;
        $copy->mailBox = $newMailbox;
        $copy->email   = $copy->mailBox . '@' . $copy->host;

        return $copy;
    }

    /**
     * {@inheritdoc}
     *
     * @throws StringsException
     */
    public function toString(array $options = []): string
    {
        return $this->__toString();
    }

    /**
     * {@inheritdoc}
     *
     * @throws StringsException
     */
    public function __toString(): string
    {
        return sprintf('%s@%s', $this->mailBox, $this->host);
    }
}
