> [!WARNING]
>
> # ARCHIVED
>
> After many years of honorable service, we have decided to archive this repository.
>
> It has been extremely useful in many projects, but the time has come to archive it because it no longer makes sense to continue using it.
>
> This was the first library we ever created: the emotional weight is considerable, and the decision has been extremely difficult.
>
> However, we realized that there is no longer any point in maintaining it.
>
> A post will follow with all the details, alternatives, and instructions on how you can replace this library in your projects.

<p align="center">
    <a href="http://www.serendipityhq.com" target="_blank">
        <img style="max-width: 350px" src="http://www.serendipityhq.com/assets/open-source-projects/Logo-SerendipityHQ-Icon-Text-Purple.png">
    </a>
</p>

<h1 align="center">Serendipity HQ Value Objects</h1>
<p align="center">A set of <a href="https://io.serendipityhq.com/experience/php-and-doctrine-immutable-objects-value-objects-and-embeddables/" target="_blank">PHP Value Objects</a> to manage simple and composite values.</p>
<p align="center">
    <a href="https://github.com/Aerendir/component-value-objects/releases"><img src="https://img.shields.io/packagist/v/serendipity_hq/component-value-objects.svg?style=flat-square"></a>
    <a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square"></a>
    <a href="https://github.com/Aerendir/component-value-objects/releases"><img src="https://img.shields.io/packagist/php-v/serendipity_hq/component-value-objects?color=%238892BF&style=flat-square&logo=php" /></a>
</p>
<p>
    Supports:
    <a title="Tested with Symfony ^4.4" href="https://github.com/Aerendir/component-value-objects/actions"><img title="Tested with Symfony ^4.4" src="https://img.shields.io/badge/Symfony-%5E4.4-333?style=flat-square&logo=symfony" /></a>
    <a title="Tested with Symfony ^5.4" href="https://github.com/Aerendir/component-value-objects/actions"><img title="Tested with Symfony ^5.4" src="https://img.shields.io/badge/Symfony-%5E5.4-333?style=flat-square&logo=symfony" /></a>
    <a title="Tested with Symfony ^6.0" href="https://github.com/Aerendir/component-value-objects/actions"><img title="Tested with Symfony ^6.0" src="https://img.shields.io/badge/Symfony-%5E6.0-333?style=flat-square&logo=symfony" /></a>
</p>
<p>
    Tested with:
    <a title="Tested with Symfony ^4.4" href="https://github.com/Aerendir/component-value-objects/actions"><img title="Tested with Symfony ^4.4" src="https://img.shields.io/badge/Symfony-%5E4.4-333?style=flat-square&logo=symfony" /></a>
    <a title="Tested with Symfony ^5.4" href="https://github.com/Aerendir/component-value-objects/actions"><img title="Tested with Symfony ^5.4" src="https://img.shields.io/badge/Symfony-%5E5.4-333?style=flat-square&logo=symfony" /></a>
    <a title="Tested with Symfony ^6.0" href="https://github.com/Aerendir/component-value-objects/actions"><img title="Tested with Symfony ^6.0" src="https://img.shields.io/badge/Symfony-%5E6.0-333?style=flat-square&logo=symfony" /></a>
</p>
<p align="center">
    <a href="https://www.php.net/manual/en/book.intl.php"><img src="https://img.shields.io/badge/Suggests-ext--intl-%238892BF?style=flat-square&logo=php"></a>
    <a href="https://www.doctrine-project.org/"><img src="https://img.shields.io/badge/Suggests-doctrine/orm-%238892BF?style=flat-square&logo=php"></a>
    <a href="https://symfony.com/doc/current/forms.html"><img src="https://img.shields.io/badge/Suggests-symfony/form-%238892BF?style=flat-square&logo=php"></a>
    <a href="https://github.com/twigphp/intl-extra"><img src="https://img.shields.io/badge/Suggests-twig/intl--extra-%238892BF?style=flat-square&logo=php"></a>
</p>

## Current Status

[![Coverage](https://sonarcloud.io/api/project_badges/measure?project=Aerendir_component-value-objects&metric=coverage)](https://sonarcloud.io/dashboard?id=Aerendir_component-value-objects)
[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=Aerendir_component-value-objects&metric=sqale_rating)](https://sonarcloud.io/dashboard?id=Aerendir_component-value-objects)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=Aerendir_component-value-objects&metric=alert_status)](https://sonarcloud.io/dashboard?id=Aerendir_component-value-objects)
[![Reliability Rating](https://sonarcloud.io/api/project_badges/measure?project=Aerendir_component-value-objects&metric=reliability_rating)](https://sonarcloud.io/dashboard?id=Aerendir_component-value-objects)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=Aerendir_component-value-objects&metric=security_rating)](https://sonarcloud.io/dashboard?id=Aerendir_component-value-objects)
[![Technical Debt](https://sonarcloud.io/api/project_badges/measure?project=Aerendir_component-value-objects&metric=sqale_index)](https://sonarcloud.io/dashboard?id=Aerendir_component-value-objects)
[![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=Aerendir_component-value-objects&metric=vulnerabilities)](https://sonarcloud.io/dashboard?id=Aerendir_component-value-objects)

[![Phan](https://github.com/Aerendir/component-value-objects/workflows/Phan/badge.svg)](https://github.com/Aerendir/component-value-objects/actions?query=branch%3Adev)
[![PHPStan](https://github.com/Aerendir/component-value-objects/workflows/PHPStan/badge.svg)](https://github.com/Aerendir/component-value-objects/actions?query=branch%3Adev)
[![PSalm](https://github.com/Aerendir/component-value-objects/workflows/PSalm/badge.svg)](https://github.com/Aerendir/component-value-objects/actions?query=branch%3Adev)
[![PHPUnit](https://github.com/Aerendir/component-value-objects/workflows/PHPunit/badge.svg)](https://github.com/Aerendir/component-value-objects/actions?query=branch%3Adev)
[![Composer](https://github.com/Aerendir/component-value-objects/workflows/Composer/badge.svg)](https://github.com/Aerendir/component-value-objects/actions?query=branch%3Adev)
[![PHP CS Fixer](https://github.com/Aerendir/component-value-objects/workflows/PHP%20CS%20Fixer/badge.svg)](https://github.com/Aerendir/component-value-objects/actions?query=branch%3Adev)
[![Rector](https://github.com/Aerendir/component-value-objects/workflows/Rector/badge.svg)](https://github.com/Aerendir/component-value-objects/actions?query=branch%3Adev)

## Features

It supports `SimpleValueObjects` and `ComplexValueObjects`.

Complex value objects are hydrated passing an array. If a key of the array isn't recognized as property of the object it
 is added to the `$otherData` array so it isn't lost.

Some of those value objects support also the persistence in Doctrine providing [custom mapping types](http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/cookbook/custom-mapping-types.html) (See below).

<hr />
<h3 align="center">
    <b>Do you like this library?</b><br />
    <b><a href="#js-repo-pjax-container">LEAVE A &#9733;</a></b>
</h3>
<p align="center">
    or run<br />
    <code>composer global require symfony/thanks && composer thanks</code><br />
    to say thank you to all libraries you use in your current project, this included!
</p>
<hr />

## What are Value Objects

Value Objects are PHP [`objects`](http://php.net/manual/en/language.types.object.php) that represent and manage simple
 or complex values. Once set, the value object cannot be modified without changing its identity.

**Simple value objects** represent a simple value, like an email.
**Complex value objects** represent complex values, that, in order to really represent a value, need more than one
value, like a price that needs an amount and a currency to be understandable and have a sense.

PHP supports only one value object: the [`DateTime`](http://php.net/manual/en/class.datetime.php) object.

This library gives support for other kind of values, differentiating them between complex and simple.

To better understand the concepts behind the value objects, you can [read this post](https://io.serendipityhq.com/experience/php-and-doctrine-immutable-objects-value-objects-and-embeddables/).

## Install component-value-objects via Composer

    $ composer require serendipity_hq/component-value-objects

This library follows the http://semver.org/ versioning conventions.

[Instructions to install Intl PHP extension in MAMP for Mac](https://io.serendipityhq.com/experience/how-to-install-php-intl-module-in-mamp/)

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

<hr />
<h3 align="center">
    <b>Do you like this library?</b><br />
    <b><a href="#js-repo-pjax-container">LEAVE A &#9733;</a></b>
</h3>
<p align="center">
    or run<br />
    <code>composer global require symfony/thanks && composer thanks</code><br />
    to say thank you to all libraries you use in your current project, this included!
</p>
<hr />
