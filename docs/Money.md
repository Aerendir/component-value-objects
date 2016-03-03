Money Complex Value Object
==========================

Represents a monetary value.

Extends [sebastianbergman/money](https://github.com/sebastianbergmann/money).

## Base Money signature

```php
// vendor/sebastian/money/src/Money.php

/**
 * @param  integer                                  $amount
 * @param  \SebastianBergmann\Money\Currency|string $currency
 * @throws \SebastianBergmann\Money\InvalidArgumentException
 */
public function __construct($amount, $currency)
```

## How to use the object

See the working example: [examples/Currency.php](examples/Money.php).

```php
$values = [
    'amount' => 300,
    'currency' => 'EUR'
];

$money = new Money($values);
dump($money);
```

## NOTES

This object is a wrapper for the Money object by Sebastian Bergman. As the original object ses private methods and properties, it isn't possible to extend it.

So this ValueObjects\Money object simply wraps an Sebastian\Money object, reimplementing all the public methods exposed by the Sebastian's Money object.

**The implementation of all of the methods isn't yet complete.**