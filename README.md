<p align="center">
    <a href="http://www.serendipityhq.com" target="_blank">
        <img src="http://www.serendipityhq.com/assets/open-source-projects/Logo-SerendipityHQ-Icon-Text-Purple.png">
    </a>
</p>

# PHP Value Objects

[![PHP from Packagist](https://img.shields.io/packagist/php-v/serendipity_hq/php_value_objects?color=%238892BF)](https://packagist.org/packages/serendipity_hq/php_value_objects)
[![Tested with Symfony ^3.4](https://img.shields.io/badge/Symfony-%5E3.4-333)](https://github.com/Aerendir/PHPValueObjects/actions)
[![Tested with Symfony ^4.0](https://img.shields.io/badge/Symfony-%5E4.0-333)](https://github.com/Aerendir/PHPValueObjects/actions)
[![Tested with Symfony ^5.0](https://img.shields.io/badge/Symfony-%5E5.0-333)](https://github.com/Aerendir/PHPValueObjects/actions)

![Suggests PHP Intl extension](https://img.shields.io/badge/Suggests-ext--intl-%238892BF)
![Suggests Doctrine ORM](https://img.shields.io/badge/Suggests-doctrine/orm-%238892BF)
![Suggests Symfony Form](https://img.shields.io/badge/Suggests-symfony/form-%238892BF)
![Suggests Twig Intl Extra](https://img.shields.io/badge/Suggests-twig/intl--extra-%238892BF)

[![Latest Stable Version](https://poser.pugx.org/serendipity_hq/php_value_objects/v/stable.png)](https://packagist.org/packages/serendipity_hq/php_value_objects)
[![Total Downloads](https://poser.pugx.org/serendipity_hq/php_value_objects/downloads.svg)](https://packagist.org/packages/serendipity_hq/php_value_objects)
[![License](https://poser.pugx.org/serendipity_hq/php_value_objects/license.svg)](https://packagist.org/packages/serendipity_hq/php_value_objects)
[![Coverage Status](https://codecov.io/gh/Aerendir/PHPValueObjects/branch/master/graph/badge.svg)](https://codecov.io/gh/Aerendir/PHPValueObjects/)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/daa2a03b-444d-4ea6-8516-10e81c089b84/mini.png)](https://insight.sensiolabs.com/projects/daa2a03b-444d-4ea6-8516-10e81c089b84)

[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=Aerendir_PHPValueObjects&metric=sqale_rating)](https://sonarcloud.io/dashboard?id=Aerendir_PHPValueObjects)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=Aerendir_PHPValueObjects&metric=alert_status)](https://sonarcloud.io/dashboard?id=Aerendir_PHPValueObjects)
[![Reliability Rating](https://sonarcloud.io/api/project_badges/measure?project=Aerendir_PHPValueObjects&metric=reliability_rating)](https://sonarcloud.io/dashboard?id=Aerendir_PHPValueObjects)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=Aerendir_PHPValueObjects&metric=security_rating)](https://sonarcloud.io/dashboard?id=Aerendir_PHPValueObjects)
[![Technical Debt](https://sonarcloud.io/api/project_badges/measure?project=Aerendir_PHPValueObjects&metric=sqale_index)](https://sonarcloud.io/dashboard?id=Aerendir_PHPValueObjects)
[![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=Aerendir_PHPValueObjects&metric=vulnerabilities)](https://sonarcloud.io/dashboard?id=Aerendir_PHPValueObjects)

[![Phan](https://github.com/Aerendir/PHPValueObjects/workflows/Phan/badge.svg)](https://github.com/Aerendir/PHPValueObjects/actions)
[![PHPStan](https://github.com/Aerendir/PHPValueObjects/workflows/PHPStan/badge.svg)](https://github.com/Aerendir/PHPValueObjects/actions)
[![PSalm](https://github.com/Aerendir/PHPValueObjects/workflows/PSalm/badge.svg)](https://github.com/Aerendir/PHPValueObjects/actions)
[![PHPUnit](https://github.com/Aerendir/PHPValueObjects/workflows/PHPunit/badge.svg)](https://github.com/Aerendir/PHPValueObjects/actions)
[![Composer](https://github.com/Aerendir/PHPValueObjects/workflows/Composer/badge.svg)](https://github.com/Aerendir/PHPValueObjects/actions)
[![PHP CS Fixer](https://github.com/Aerendir/PHPValueObjects/workflows/PHP%20CS%20Fixer/badge.svg)](https://github.com/Aerendir/PHPValueObjects/actions)
[![Rector](https://github.com/Aerendir/PHPValueObjects/workflows/Rector/badge.svg)](https://github.com/Aerendir/PHPValueObjects/actions)

A set of [PHP Value Objects](https://io.serendipityhq.com/experience/php-and-doctrine-immutable-objects-value-objects-and-embeddables/) to manage simple and composite values.

It supports `SimpleValueObjects` and `ComplexValueObjects`.

Complex value objects are hydrated passing an array. If a key of the array isn't recognized as property of the object it
 is added to the `$otherData` array so it isn't lost.

Some of those value objects support also the persistence in Doctrine providing [custom mapping types](http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/cookbook/custom-mapping-types.html) (See below).

## What are Value Objects

Value Objects are PHP [`objects`](http://php.net/manual/en/language.types.object.php) that represent and manage simple
 or complex values. Once set, the value object cannot be modified without changing its identity.

**Simple value objects** represent a simple value, like an email.
**Complex value objects** represent complex values, that, in order to really represent a value, need more than one
value, like a price that needs an amount and a currency to be understandable and have a sense.

PHP supports only one value object: the [`DateTime`](http://php.net/manual/en/class.datetime.php) object.

This library gives support for other kind of values, differentiating them between complex and simple.

To better understand the concepts behind the value objects, you can [read this post](https://io.serendipityhq.com/experience/php-and-doctrine-immutable-objects-value-objects-and-embeddables/).

## Install PHPValueObjects via Composer

    $ composer require serendipity_hq/php_value_objects

or, in your composer.json

    "require": {
      "serendipity_hq/php_value_objects": "~5"
    }


This library follows the http://semver.org/ versioning conventions.

### Suggests

- [Intl PHP extension](http://php.net/manual/en/book.intl.php)
 ([instructions for MAMP on Mac](https://io.serendipityhq.com/experience/how-to-install-php-intl-module-in-mamp/))

## Available Value Objects

Currently, this library supports the following Value Objects:

* **[Address](docs/Address.md)**: Built-in. A more advanced value object is [`commerceguys/addressing`](https://github.com/commerceguys/addressing) (but it more suited for shipping addresses than for addresses themself);
* **[CurrencyExchangeRate](docs/CurrencyExchangeRate.md)**: Built-in;
* **[Email](docs/Email.md)**: A basic class derived from [Wowo's gist EmailValueObject](https://gist.github.com/wowo/b49ac45b975d5c489214). It implements [`egulias/email-validator](https://github.com/egulias/EmailValidator) to validate emails;
* **[IP](docs/Ip.md)**: Just a proxy for the library [`darsyn/ip`](https://github.com/darsyn/ip);
* **[Money](docs/Money.md)**: Just a proxy for the library [`moneyphp/money`](https://github.com/moneyphp/money);
* **[Payment](docs/Payment.md)**: Built-in
* **[Phone](docs/Phone.md)**: Just a proxy for the library [`giggsey/libphonenumber-for-php`](https://github.com/giggsey/libphonenumber-for-php);
* **[Tax](docs/Tax.md)**: Built-in
* **[Uri](docs/Uri.md)**: Just a proxy for the library [`Laminas\Uri`](https://github.com/laminas/laminas-uri) (formerly Zend Uri). A more advanced value object is [`League\Uri`](https://github.com/thephpleague/uri)
* **[VatRate](docs/Vat.md)**: Built-in
* **[VatNumber](docs/VatNumber.md)**: Built-in

## Supported features

<table>
    <thead>
        <tr>
            <th scope="col">ValueObject</th>
            <th scope="col" colspan="2">Doctrine</th>
            <th scope="col" colspan="2">Symfony</th>
        </tr>
        <tr>
            <th scope="col"></th>
            <th scope="col">Embeddable</th>
            <th scope="col">Type</th>
            <th scope="col">Form Type</th>
            <th scope="col">Twig filter</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">Address</th>
            <td>✓</td>
            <td>✕</td>
            <td>✓</td>
            <td>✕</td>
        </tr>
        <tr>
            <th scope="row">Currency</th>
            <td>N/A</td>
            <td>✓</td>
            <td>✕</td>
            <td>✕</td>
        </tr>
        <tr>
            <th scope="row">CurrencyExchangeRate</th>
            <td>N/A</td>
            <td>N/A</td>
            <td>N/A</td>
            <td>N/A</td>
        </tr>
        <tr>
            <th scope="row">Email</th>
            <td>N/A</td>
            <td>✓</td>
            <td>N/A</td>
            <td>N/A</td>
        </tr>
        <tr>
            <th scope="row">IP</th>
            <td>N/A</td>
            <td>N/A</td>
            <td>N/A</td>
            <td>N/A</td>
        </tr>
        <tr>
            <th scope="row">Money</th>
            <td>N/A</td>
            <td>✓</td>
            <td>✓</td>
            <td>✓</td>
        </tr>
        <tr>
            <th scope="row">Payment</th>
            <td>✕</td>
            <td>✕</td>
            <td>✕</td>
            <td>✕</td>
        </tr>
        <tr>
            <th scope="row">Phone</th>
            <td>✕</td>
            <td>✕</td>
            <td>✕</td>
            <td>✕</td>
        </tr>
        <tr>
            <th scope="row">Tax</th>
            <td>✕</td>
            <td>✕</td>
            <td>✕</td>
            <td>✕</td>
        </tr>
        <tr>
            <th scope="row">Uri</th>
            <td>✕</td>
            <td>✓</td>
            <td>✕</td>
            <td>✕</td>
        </tr>
        <tr>
            <th scope="row">VAT Rate</th>
            <td>✕</td>
            <td>✕</td>
            <td>✕</td>
            <td>✕</td>
        </tr>
        <tr>
            <th scope="row">VAT Number</th>
            <td>✕</td>
            <td>✕</td>
            <td>✕</td>
            <td>✕</td>
        </tr>
    </tbody>
</table>
