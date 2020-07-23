*Do you like this bundle? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*

Email Simple Value Object
=========================

Represents an email value.

Inspired by a [Wowo's gist](https://gist.github.com/wowo/b49ac45b975d5c489214), it uses
 [egulias/email-validator](https://github.com/egulias/EmailValidator).

- [How to use the Doctrine's type `email`](Email/Email-Doctrine-Type.md)

## Base Currency signature

```php
// src/Email/Email.php

/**
 * @param string $value The email to set in the object
 */
public function __construct($value)
```

## About Email value object

The Email object doesn't return Uri objects for the host part of the email as we don't know its real schema (especially
if it is http or https), so we don't need an object to manage it but it is sufficient to use a property to manage it.

*Do you like this bundle? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*
