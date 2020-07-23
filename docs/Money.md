*Do you like this bundle? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*

Money Complex Value Object
==========================

Represents a monetary value.

Extends [sebastianbergman/money](https://github.com/sebastianbergmann/money).

- [How to use the Doctrine's type `money`](Money/Money-Doctrine-Type.md)
- [How to use the Twig extensions](Money/Money-Twig.md)
- [How to use the Symfony Form type](Money/Money-Symfony-form-type.md)

## Base Money signature

```php
// vendor/moneyphp/money/src/Money.php

/**
 * @param  integer                $amount
 * @param  \Money\Currency|string $currency
 * @throws \Money\InvalidArgumentException
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

This object is a wrapper for the Money object by PHPMoney.

As the original object is a `final` class, it is not possible to extend it.

So this ValueObjects\Money object simply wraps an `\Money\Money` object.

*Do you like this bundle? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*
