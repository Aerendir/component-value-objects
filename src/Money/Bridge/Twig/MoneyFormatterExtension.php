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

namespace SerendipityHQ\Component\ValueObjects\Money\Bridge\Twig;

use Money\Currencies\ISOCurrencies;
use Money\Formatter\IntlMoneyFormatter;
use SerendipityHQ\Component\ValueObjects\Money\Money;

/**
 * {@inheritdoc}
 */
class MoneyFormatterExtension extends \Twig_Extension
{
    private $currencies;

    /**
     * Initiaizes the currencies repository.
     */
    public function __construct()
    {
        $this->currencies = new ISOCurrencies();
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('localizedmoney', [$this, 'localizeMoneyFilter']),
        ];
    }

    /**
     * @param Money $money
     * @param null  $locale
     *
     * @return string
     */
    public function localizeMoneyFilter(Money $money, $locale = null)
    {
        $formatter      = twig_get_number_formatter($locale, 'currency');
        $moneyFormatter = new IntlMoneyFormatter($formatter, $this->currencies);

        /** @var \Money\Money $money */
        $money = $money->getValueObject();

        return $moneyFormatter->format($money);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'localized_money';
    }
}
