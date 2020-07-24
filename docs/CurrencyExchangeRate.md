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
$values = [
    'From' => new Currency('EUR'),
    'To'   => new Currency('USD'),
    'ExchangeRate' => 1.1174,
    'ExchangeRateDate' => new \DateTime()
];

$currencyExchangeRate = new CurrencyExchangeRate($values);
dump($currencyExchangeRate);
```

*Do you like this library? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*
