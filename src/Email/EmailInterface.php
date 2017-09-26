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
     * @param $newMailBox
     *
     * @return $this
     */
    public function changeMailBox($newMailBox): EmailInterface;
}
