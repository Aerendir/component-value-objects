*Do you like this library? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*

VatRate Simple Value Object
===========================

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

*Do you like this library? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*
