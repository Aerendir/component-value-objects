Vat Simple Value Object
=======================

Represents a vat tax.

## Base Vat signature

```php
// src/Vat/Vat.php

/**
 * @param string $values
 */
public function __construct($countryCode)
```

## How to use the object

See the working example: [examples/Vat.php](examples/Vat.php).

```php
$vat = new Vat('IT');
dump($vatNumber);
```
