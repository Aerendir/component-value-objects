<?php

/**
 *    @author      Aerendir <hello@aerendir.me>
 *    @copyright   Copyright (C) 2016 SerendipityHQ. All rights reserved.
 *    @license     MIT
 */
namespace SerendipityHQ\Component\ValueObjects\Tax;

use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectTrait;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;
use SerendipityHQ\Component\ValueObjects\Money\Money;

/**
 * Default implementation of a Tax Value object.
 *
 * @todo $compound: This is a value returned by WooCommerce API: I don't know yet what it contains.
 */
class Tax implements TaxInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    /** @var Money $amount The paid amount of taxes */
    private $amount;

    /** @var string $code A string that identifies uniquely the tax on the Remote system */
    private $code;

    /** @var Money $compound The amount of taxes */
    private $compound;

    /** @var float $rate The rate of the tax */
    private $rate;

    /** @var string $title The title of the tax on the Remote system */
    private $title;

    /**
     * {@inheritdoc}
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * {@inheritdoc}
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * {@inheritdoc}
     */
    public function getCompound()
    {
        return $this->compound;
    }

    /**
     * {@inheritdoc}
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->__toString();
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->code . ' ' . $this->amount;
    }

    /**
     * Method to set the paid amount of taxes.
     *
     * @param Money $amount
     */
    protected function setAmount(Money $amount)
    {
        $this->amount = $amount;
    }

    /**
     * Sets the code of the Tax on the remote system.
     *
     * @param string $code Is a string that identifies the Tax on the Remote System
     */
    protected function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Method to set the compound amount of taxes.
     *
     * @param Money $compound
     */
    protected function setCompound(Money $compound)
    {
        $this->compound = $compound;
    }

    /**
     * Method to set the rate of the tax.
     *
     * @param float $rate The rate of the tax
     */
    protected function setRate($rate)
    {
        if (false === is_float($rate)) {
            throw new \InvalidArgumentException(
                sprintf('The Rate MUST be a float. "%s" passed.', gettype($rate))
            );
        }
        $this->rate = $rate;
    }

    /**
     * Sets the title of the Tax on the remote system.
     *
     * @param string $title The title of the Tax on the Remote system
     */
    protected function setTitle($title)
    {
        $this->title = $title;
    }
}
