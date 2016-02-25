<?php

/**
 *    @author      Aerendir <hello@aerendir.me>
 *    @copyright   Copyright (C) 2016 SerendipityHQ. All rights reserved.
 *    @license     MIT
 */
namespace SerendipityHQ\Component\ValueObjects\Tax;

use SerendipityHQ\Component\ValueObjects\Money\Money;

/**
 * Default implementation of a Tax Value object.
 *
 * @todo $compound: This is a value returned by WooCommerce API: I don't know yet what it contains.
 */
class Tax implements TaxInterface
{
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
    public function setAmount(Money $amount)
    {
        $this->amount = $amount;
    }

    /**
     * {@inheritdoc}
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * {@inheritdoc}
     */
    public function setCompound(Money $compound)
    {
        $this->compound = $compound;
    }

    /**
     * {@inheritdoc}
     */
    public function setRate($rate)
    {
        if (false === is_float($rate)) {
            throw new \InvalidArgumentException(
                sprintf('The Rate MUST be a float. "%s" passed.', gettype($rate))
            );
        }
        $this->rate = $rate;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}
