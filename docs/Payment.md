Payment Complex Value Object
============================

Represents a payment value.

## Base Payment signature

```php
// src/Payment/Payment.php

/**
 * @param string $values
 */
public function __construct($values)
```

## How to use the object

See the working example: [examples/Payment.php](examples/Payment.php).

```php
$values = [
    'method' => 'PayPal',
    'status' => 'Paid'
];

$payment = new Payment($values);
dump($payment);
```
