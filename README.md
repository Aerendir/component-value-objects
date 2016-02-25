[![Latest Stable Version](https://poser.pugx.org/aerendir/php_value_objects/v/stable.png)](https://packagist.org/packages/aerendir/php_value_objects)
[![Build Status](https://travis-ci.org/Aerendir/PHPValueObjects.svg?branch=master)](https://travis-ci.org/Aerendir/PHPValueObjects)
[![Total Downloads](https://poser.pugx.org/serendipity_hq/php_value_objects/downloads.svg)](https://packagist.org/packages/serendipity_hq/php_value_objects)
[![License](https://poser.pugx.org/serendipity_hq/php_value_objects/license.svg)](https://packagist.org/packages/serendipity_hq/php_value_objects)
[![Code Climate](https://codeclimate.com/github/Aerendir/PHPValueObjects/badges/gpa.svg)](https://codeclimate.com/github/Aerendir/PHPValueObjects)
[![Test Coverage](https://codeclimate.com/github/Aerendir/PHPValueObjects/badges/coverage.svg)](https://codeclimate.com/github/Aerendir/PHPValueObjects)
[![Issue Count](https://codeclimate.com/github/Aerendir/PHPValueObjects/badges/issue_count.svg)](https://codeclimate.com/github/Aerendir/PHPValueObjects)
[![StyleCI](https://styleci.io/repos/38658138/shield)](https://styleci.io/repos/38658138)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/daa2a03b-444d-4ea6-8516-10e81c089b84/mini.png)](https://insight.sensiolabs.com/projects/daa2a03b-444d-4ea6-8516-10e81c089b84)
[![Dependency Status](https://www.versioneye.com/user/projects/56ae29e27e03c7003ba4150d/badge.svg?style=flat)](https://www.versioneye.com/user/projects/56ae29e27e03c7003ba4150d)
[![Coverage Status](https://coveralls.io/repos/github/Aerendir/PHPValueObjects/badge.svg?branch=master)](https://coveralls.io/github/Aerendir/PHPValueObjects?branch=master)

# PHP Value Objects
A set of [PHP Value Objects](http://aerendir.me/?p=396) to manage composite values.

## Available Value Objects

Currently, this library supports the following Value Objects:

* **Address**: Just a proxy for the library [commerceguys/addressing](https://github.com/commerceguys/addressing);
* **Currency**: Just a proxy for the class provided in library [sebastian/money](https://github.com/sebastianbergmann/money);
* **Email**: A basic class derived from [Wowo's gist EmailValueObject](https://gist.github.com/wowo/b49ac45b975d5c489214). It implements [egulias/email-validator](https://github.com/egulias/EmailValidator) to validate emails;
* **IP**: Just a proxy for the library [darsyn/ip](https://github.com/darsyn/ip);
* **Money**: Just a proxy for the library [sebastian/money](https://github.com/sebastianbergmann/money);
* **Phone**: Just a proxy for the library [giggsey/libphonenumber-for-php](https://github.com/giggsey/libphonenumber-for-php);
* **Tax**: 
* **Uri**: Just a proxy for the library [Zend\Uri](https://github.com/zendframework/zend-uri).

## Relevant alternatives

**IP**:

* [rlanvin/php-ip](https://github.com/rlanvin/php-ip)

## Install via Composer

    $ composer require serendipity_hq/php_value_objects

or, in your composer.json

    "require": {
      "serendipity_hq/php_value_objects": "~1"
    }
  

This library follows the http://semver.org/ versioning conventions.

### ! ! ! IMPORTANT NOTES ! ! !

As this library uses sebastian/money, you are required to install the Intl PHP extension in order to use it.

You can find [here](http://aerendir.me/?p=452) instruction about how to do this on a Mac with MAMP.

## About Email value object

The Email object doesn't return Uri objects for the host part of the email as we don't know its real schema (especially if it is http or https), so we don't need an object to manage it but it is sufficient to use a property to manage it.
