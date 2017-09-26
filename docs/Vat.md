VatRate Simple Value Object
=======================

Represents a vat tax.

## Base VatRate signature

```php
// src/VatRate/VatRate.php

/**
 * @param string $values
 */
public function __construct($countryCode)
```

## How to use the object

See the working example: [examples/VatRate.php](examples/Vat.php).

```php
$vat = new VatRate('IT');
dump($vatNumber);
```
