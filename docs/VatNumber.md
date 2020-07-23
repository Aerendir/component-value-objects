*Do you like this bundle? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*

VatNumber Complex Value Object
============================

Represents a vat number value.

## Base VatNumber signature

```php
// src/VatNumber/VatNumber.php

/**
 * @param string $values
 */
public function __construct($values)
```

## How to use the object

See the working example: [examples/VatNumber.php](examples/VatNumber.php).

```php
$values = [
    'countryCode' => 'IT',
    'number' => '01234567891',
    'vatNumber' => 'IT01234567891'
];

$vatNumber = new VatNumber($values);
dump($vatNumber);
```

*Do you like this bundle? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*
