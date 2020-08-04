<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Component\ValueObjects\Tax;

use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectTrait;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;
use SerendipityHQ\Component\ValueObjects\Money\MoneyInterface;

/**
 * Default implementation of a Tax Value object.
 */
final class Tax implements TaxInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    /** @var string A string that identifies uniquely the tax on the Remote system */
    private $code;

    /** @var bool If the tax is compound or not */
    private $compound;

    /** @var float The rate of the tax */
    private $rate;

    /** @var MoneyInterface The paid amount of taxes */
    private $amount;

    /** @var string The title of the tax on the Remote system */
    private $title;

    /**
     * {@inheritdoc}
     */
    public function getCode(): ? string
    {
        return $this->code;
    }

    /**
     * {@inheritdoc}
     */
    public function getRate(): ? float
    {
        return $this->rate;
    }

    /**
     * {@inheritdoc}
     */
    public function getAmount(): ? MoneyInterface
    {
        return $this->amount;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle(): ? string
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function isCompound(): ? bool
    {
        return $this->compound;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->__toString();
    }

    /**
     * Sets the code of the Tax on the remote system.
     *
     * @param string $code Is a string that identifies the Tax on the Remote System
     */
    protected function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * Method to set the compound amount of taxes.
     *
     * @param bool $compound
     */
    protected function setCompound(bool $compound): void
    {
        $this->compound = $compound;
    }

    /**
     * Method to set the rate of the tax.
     *
     * @param float $rate The rate of the tax
     */
    protected function setRate(float $rate): void
    {
        $this->rate = $rate;
    }

    /**
     * Method to set the paid amount of taxes.
     *
     * @param MoneyInterface $amount
     */
    protected function setAmount(MoneyInterface $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * Sets the title of the Tax on the remote system.
     *
     * @param string $title The title of the Tax on the Remote system
     */
    protected function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        return $this->code . ' ' . $this->amount;
    }
}
