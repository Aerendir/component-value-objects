*Do you like this library? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*

Tax Complex Value Object
========================

Represents a tax value.

## Base Tax signature

```php
// src/Tax/Tax.php

/**
 * @param string $values
 */
public function __construct($values)
```

## How to use the object

See the working example: [examples/Payment.php](examples/Payment.php).

```php
use SerendipityHQ\Component\ValueObjects\Money\Money;
use SerendipityHQ\Component\ValueObjects\Tax\Tax;

$values = [
    Tax::AMOUNT => new Money([Money::HUMAN_AMOUNT => 200, Money::CURRENCY =>'EUR']),
    Tax::CODE => 'IVA IT',
    Tax::COMPOUND => new Money([Money::HUMAN_AMOUNT => 100, Money::CURRENCY =>'EUR']),
    Tax::RATE => 22.0,
    Tax::TITLE => 'IVA Italiana'
];

$tax = new Tax($values);
dump($tax);
```

*Do you like this library? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*
