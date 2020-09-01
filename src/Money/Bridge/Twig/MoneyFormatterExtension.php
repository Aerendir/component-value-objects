<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Component\ValueObjects\Money\Bridge\Twig;

use Money\Currencies\ISOCurrencies;
use Money\Exception\ParserException;
use Money\Formatter\IntlMoneyFormatter;
use SerendipityHQ\Component\ValueObjects\Money\Money;
use Twig\Error\SyntaxError;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * {@inheritdoc}
 */
final class MoneyFormatterExtension extends AbstractExtension
{
    /** @var ISOCurrencies */
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
     *
     * @return TwigFilter[]
     */
    public function getFilters(): array
    {
        return \array_merge(parent::getFilters(), [
            new TwigFilter('localizedmoney', function (?Money $money, string $locale = 'en-US'): ?string {
                return $this->localizeMoneyFilter($money, $locale);
            }),
            new TwigFilter('localizedmoneyfromarr', function (array $money, string $locale = null): string {
                return $this->localizeMoneyFromArrFilter($money, $locale);
            }),
        ]);
    }

    /**
     * @param Money|null  $money
     * @param string|null $locale
     *
     * @return string|null
     */
    public function localizeMoneyFilter(?Money $money, string $locale = 'en-US'): ?string
    {
        if (null === $money) {
            return null;
        }
        $formatter      = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
        $moneyFormatter = new IntlMoneyFormatter($formatter, $this->currencies);

        /** @var \Money\Money $formattingMoney */
        $formattingMoney = $money->getValueObject();

        return $moneyFormatter->format($formattingMoney);
    }

    /**
     * @param array<string, float|int|string> $money
     * @param string|null                     $locale
     *
     * @throws SyntaxError
     * @throws \InvalidArgumentException
     * @throws ParserException
     *
     * @return string
     */
    public function localizeMoneyFromArrFilter(array $money, string $locale = null): string
    {
        if (isset($money['humanAmount'], $money['baseAmount'])) {
            unset($money['humanAmount']);
        }

        $formattingMoney = new Money($money);

        return $this->localizeMoneyFilter($formattingMoney, $locale);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'localized_money';
    }
}
