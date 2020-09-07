*Do you like this library? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*

Currency Complex Value Object
============================

Represents a currency value. Offers some helping methods to manage currencies.

Extends [Currency](https://github.com/sebastianbergmann/money/blob/master/src/Currency.php) in
 [sebastianbergman/money](https://github.com/sebastianbergmann/money).

## Base Currency signature

```php
// vendor/sebastian/money/src/CurrencyExchangeRate.php

/**
 * Required parameters are:
 *
 * - From: The Currency in which the amount is;
 * - To: The Currency in which the amount is converted/exchanged;
 * - ExchangeRate: The rate of the exchanging/conversion.
 *
 * @param array $values
 */
public function __construct(array $values)
```

## How to use the object

See the working example: [examples/CurrencyExchangeRate.php](examples/CurrencyExchangeRate.php).

```php
use Money\Currency;
use SerendipityHQ\Component\ValueObjects\CurrencyExchangeRate\CurrencyExchangeRate;
use SerendipityHQ\Component\ValueObjects\CurrencyExchangeRate\CurrencyExchangeRateInterface;

$values = [
    CurrencyExchangeRateInterface::FROM => new Currency('EUR'),
    CurrencyExchangeRateInterface::TO   => new Currency('USD'),
    CurrencyExchangeRateInterface::EXCHANGE_RATE => 1.1174,
    CurrencyExchangeRateInterface::EXCHANGE_RATE_DATE => new \DateTime()
];

$currencyExchangeRate = new CurrencyExchangeRate($values);
dump($currencyExchangeRate);
```

*Do you like this library? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*
