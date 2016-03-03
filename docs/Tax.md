Tax Complex Value Object
============================

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
$values = [
    'amount' => new Money(['amount' => 200, 'currency' =>'EUR']),
    'code' => 'IVA IT',
    'compound' => new Money(['amount' => 100, 'currency' =>'EUR']),
    'rate' => 22.0,
    'title' => 'IVA Italiana'
];

$tax = new Tax($values);
dump($tax);
```
