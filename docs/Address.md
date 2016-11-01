Address Complex Value Object
============================

Represents an address value. Offers some helping formatters to display the address.

Extends [commerceguys/addressing](https://github.com/commerceguys/addressing).

## How to use the object

See the working example: [examples/Address.php](examples/Address.php).

```php
$values = [
    'CountryCode'        => 'IT',
    'AdministrativeArea' => 'Salerno',
    'Locality'           => 'Nocera Inferiore',
    'PostalCode'         => '84014',
    'Street'             => 'Via dalle scatole, 17',
    'ExtraLine'          => 'Interno 123'
];

$address = new Address($values);
dump($address);
```


