[![Latest Stable Version](https://poser.pugx.org/serendipity_hq/php_value_objects/v/stable.png)](https://packagist.org/packages/serendipity_hq/php_value_objects)
[![Build Status](https://travis-ci.org/Aerendir/PHPValueObjects.svg?branch=master)](https://travis-ci.org/Aerendir/PHPValueObjects)
[![Total Downloads](https://poser.pugx.org/serendipity_hq/php_value_objects/downloads.svg)](https://packagist.org/packages/serendipity_hq/php_value_objects)
[![License](https://poser.pugx.org/serendipity_hq/php_value_objects/license.svg)](https://packagist.org/packages/serendipity_hq/php_value_objects)
[![Code Climate](https://codeclimate.com/github/Aerendir/PHPValueObjects/badges/gpa.svg)](https://codeclimate.com/github/Aerendir/PHPValueObjects)
[![Test Coverage](https://codeclimate.com/github/Aerendir/PHPValueObjects/badges/coverage.svg)](https://codeclimate.com/github/Aerendir/PHPValueObjects)
[![Issue Count](https://codeclimate.com/github/Aerendir/PHPValueObjects/badges/issue_count.svg)](https://codeclimate.com/github/Aerendir/PHPValueObjects)
[![StyleCI](https://styleci.io/repos/38658138/shield)](https://styleci.io/repos/38658138)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/daa2a03b-444d-4ea6-8516-10e81c089b84/mini.png)](https://insight.sensiolabs.com/projects/daa2a03b-444d-4ea6-8516-10e81c089b84)
[![Dependency Status](https://www.versioneye.com/user/projects/56ae29e27e03c700377e0087/badge.svg?style=flat)](https://www.versioneye.com/user/projects/56ae29e27e03c700377e0087)

# PHP Value Objects
A set of [PHP Value Objects](http://aerendir.me/?p=396) to manage simple and composite values.

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

To better understand the concepts behind the value objects, you can [read this post](http://aerendir.me/?p=396).

## Install PHPValueObjects via Composer

    $ composer require serendipity_hq/php_value_objects

or, in your composer.json

    "require": {
      "serendipity_hq/php_value_objects": "~2"
    }


This library follows the http://semver.org/ versioning conventions.

### Requirements

- PHP: >= 5.6
- [Intl PHP extension](http://php.net/manual/en/book.intl.php)
 ([instructions for MAMP on Mac](http://aerendir.me/?p=452))

## Available Value Objects

Currently, this library supports the following Value Objects:

* **[Address](docs/Address.md)**: Just a proxy for the library
 [`commerceguys/addressing`](https://github.com/commerceguys/addressing);
* **[Currency](docs/Currency.md)**: Just a proxy for the class provided in library
 [`sebastian/money`](https://github.com/sebastianbergmann/money) (**DEPRECATED**: this library is deprecated. Use [`moneyphp/money`](https://github.com/moneyphp/money) instead - see [Issue #18](https://github.com/Aerendir/PHPValueObjects/issues/18));
* **[CurrencyExchangeRate](docs/CurrencyExchangeRate.md)**: Built-in;
* **[Email](docs/Email.md)**: A basic class derived from [Wowo's gist EmailValueObject](https://gist.github.com/wowo/b49ac45b975d5c489214). It implements [`egulias/email-validator](https://github.com/egulias/EmailValidator) to validate emails;
* **[IP](docs/Ip.md)**: Just a proxy for the library [`darsyn/ip`](https://github.com/darsyn/ip);
* **[Money](docs/Money.md)**: Just a proxy for the library [`sebastian/money`](https://github.com/sebastianbergmann/money) (**DEPRECATED**: this library is deprecated. Use [`moneyphp/money`](https://github.com/moneyphp/money) instead - see [Issue #18](https://github.com/Aerendir/PHPValueObjects/issues/18));
* **[Payment](docs/Payment.md)**: Built-in
* **[Phone](docs/Phone.md)**: Just a proxy for the library [`giggsey/libphonenumber-for-php`](https://github.com/giggsey/libphonenumber-for-php);
* **[Tax](docs/Tax.md)**: Built-in
* **[Uri](docs/Uri.md)**: Just a proxy for the library [`Zend\Uri`](https://github.com/zendframework/zend-uri). A more advanced value object is [`League\Uri`](https://github.com/thephpleague/uri)
* **[Vat](docs/Vat.md)**: Built-in
* **[VatNumber](docs/VatNumber.md)**: Built-in

## Supported Custom Mapping Types

* `CurrencyType`
* `EmailType`
* `MoneyType`
* `UriType`

To use the custom mapping types, you have to manually register them.

If you are using Symfony, read [Registering custom Mapping Types](https://symfony.com/doc/current/doctrine/dbal.html#registering-custom-mapping-types)
