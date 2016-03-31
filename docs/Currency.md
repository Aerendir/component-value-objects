Currency Complex Value Object
============================

Represents a currency value. Offers some helping methods to manage currencies.

Extends [Currency](https://github.com/sebastianbergmann/money/blob/master/src/Currency.php) in
 [sebastianbergman/money](https://github.com/sebastianbergmann/money).

## Base Currency signature

```php
// vendor/sebastian/money/src/Currency.php

/**
 * @param string $currencyCode
 *
 * @throws \SebastianBergmann\Money\InvalidArgumentException
 */
public function __construct(array $values)
```

## How to use the object

See the working example: [examples/Currency.php](examples/Currency.php).

```php
$value = [
    'IsoCode' => 'EUR',
    'ConversionRate' => 1.1174
];

$currency = new Currency($value);
dump($currency);
```
