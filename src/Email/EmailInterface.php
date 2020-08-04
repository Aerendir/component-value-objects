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

use SerendipityHQ\Component\ValueObjects\Common\SimpleValueObjectInterface;

/**
 * Defines the minimum requisites of an Email value object.
 */
interface EmailInterface extends SimpleValueObjectInterface
{
    /**
     * Returns the original email passed to the object.
     *
     * @return string
     */
    public function getEmail(): string;

    /**
     * The mail box part of the email (box@host.com).
     *
     * @return string
     */
    public function getMailBox(): string;

    /**
     * Return the host part of the email (box@host.com).
     *
     * @return string
     */
    public function getHost(): string;

    /**
     * Change the mailbox.
     *
     * This returns a new Email object.
     *
     * @param string $newMailBox
     *
     * @return EmailInterface
     */
    public function changeMailBox(string $newMailBox): self;
}
