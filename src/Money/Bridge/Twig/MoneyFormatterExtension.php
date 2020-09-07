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
use Money\Formatter\IntlMoneyFormatter;
use SerendipityHQ\Component\ValueObjects\Money\Money;
use SerendipityHQ\Component\ValueObjects\Money\MoneyInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

final class MoneyFormatterExtension extends AbstractExtension
{
    private const DEFAULT_LOCALE = 'en-US';

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
     * {@inheritDoc}
     *
     * @return TwigFilter[]
     * @psalm-suppress MixedArgumentTypeCoercion
     */
    public function getFilters(): array
    {
        return \array_merge(parent::getFilters(), [
            new TwigFilter('localizedmoney', function (?Money $money, string $locale = self::DEFAULT_LOCALE): ?string {
                return $this->localizeMoneyFilter($money, $locale);
            }),
            new TwigFilter('localizedmoneyfromarr', function (array $money, string $locale = self::DEFAULT_LOCALE): ?string {
                return $this->localizeMoneyFromArrFilter($money, $locale);
            }),
        ]);
    }

    public function localizeMoneyFilter(?Money $money, string $locale = self::DEFAULT_LOCALE): ?string
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
     */
    public function localizeMoneyFromArrFilter(array $money, string $locale = self::DEFAULT_LOCALE): ?string
    {
        if (isset($money[MoneyInterface::HUMAN_AMOUNT], $money[MoneyInterface::BASE_AMOUNT])) {
            unset($money[MoneyInterface::HUMAN_AMOUNT]);
        }

        $formattingMoney = new Money($money);

        return $this->localizeMoneyFilter($formattingMoney, $locale);
    }

    public function getName(): string
    {
        return 'localized_money';
    }
}
