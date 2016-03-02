Address Complex Value Object
============================

Represents an address value. Offers some helping formatters to display the address.

Extends [commerceguys/addressing](https://github.com/commerceguys/addressing).

## Base Address signature

```php
// vendor/commerceguys/addressing/src/Model/Address.php

/**
 * Creates an Address instance.
 *
 * @param string $countryCode        The two-letter country code.
 * @param string $administrativeArea The administrative area.
 * @param string $locality           The locality.
 * @param string $dependentLocality  The dependent locality.
 * @param string $postalCode         The postal code.
 * @param string $sortingCode        The sorting code
 * @param string $addressLine1       The first line of the address block.
 * @param string $addressLine2       The second line of the address block.
 * @param string $organization       The organization.
 * @param string $recipient          The recipient.
 * @param string $locale             The locale. Defaults to 'und'.
 */
public function __construct(
    $countryCode = '',
    $administrativeArea = '',
    $locality = '',
    $dependentLocality = '',
    $postalCode = '',
    $sortingCode = '',
    $addressLine1 = '',
    $addressLine2 = '',
    $organization = '',
    $recipient = '',`
    $locale = 'IT'
)
```

## How to use the object

See the working example: [examples/Address.php](examples/Address.php).

```php
$values = [
    'CountryCode'        => 'IT',
    'AdministrativeArea' => 'Salerno',
    'Locality'           => 'Nocera Inferiore',
    'PostalCode'         => '84014',
    'SortingCode'        => '',
    'AddressLine1'       => 'Piazza la bomba e scappa',
    'AddressLine2'       => 'Non ce l\'hai fatta',
    'Organization'       => 'Aerendir Company',
    // Recipient's name and surname
    'Recipient'          => 'Adamo Crespi',
    'locale'             => 'und'
];

$address = new Address($values);
dump($address);
```
