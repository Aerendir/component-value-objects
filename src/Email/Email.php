<?php

declare(strict_types=1);

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
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

use function Safe\sprintf;

final class Email implements EmailInterface
{
    use DisableWritingMethodsTrait;

    private string $email;
    private string $mailBox;
    private string $host;

    /**
     * @param string $value The email to set in the object
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

    public function __toString(): string
    {
        return sprintf('%s@%s', $this->mailBox, $this->host);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getMailBox(): string
    {
        return $this->mailBox;
    }

    public function changeMailBox(string $newMailbox): EmailInterface
    {
        $copy          = clone $this;
        $copy->mailBox = $newMailbox;
        $copy->email   = $copy->mailBox . '@' . $copy->host;

        return $copy;
    }

    public function toString(array $options = []): string
    {
        return $this->__toString();
    }
}
