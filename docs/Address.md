*Do you like this library? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*

Address Complex Value Object
============================

Represents an address value. Offers some helping formatters to display the address.

Extends [commerceguys/addressing](https://github.com/commerceguys/addressing).

- [How to use the Doctrine's embeddable `Address`](Address/Address-Embeddable.md)

## How to use the object

See the working example: [examples/Address.php](examples/Address.php).

```php
use SerendipityHQ\Component\ValueObjects\Address\Address;
use SerendipityHQ\Component\ValueObjects\Address\AddressInterface;

$values = [
    AddressInterface::COUNTRY_CODE        => 'IT',
    AddressInterface::ADMINISTRATIVE_AREA => 'Salerno',
    AddressInterface::LOCALITY           => 'Nocera Inferiore',
    AddressInterface::POSTAL_CODE         => '84014',
    AddressInterface::STREET             => 'Via dalle scatole, 17',
    AddressInterface::EXTRA_LINE          => 'Interno 123'
];

$address = new Address($values);
dump($address);
```

*Do you like this library? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*
