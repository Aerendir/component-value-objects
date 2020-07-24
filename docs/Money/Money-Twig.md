*Do you like this library? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*

[Money Documentation](../Money.md)

# How to use the Money Twig Extension

*NOTE: You can read more about Twig extensions in Symfony here: [How to Write a custom Twig Extension](https://symfony.com/doc/current/templating/twig_extension.html)*

To use the Twig Extension of Money, you have to follow those steps:

1. Register the extension in your Symfony's configuration;
2. Use the extension in your Twig templates.

## STEP 0: Install `twig/intl-extra`

```console
composer req twig/intl-extra
```

## STEP 1: Register the extension in your Symfony's configuation

Open the file `/config/packages/twig.yaml`.

Add the extension to the configuration:

```yaml
services:
    ...
    SerendipityHQ\Component\ValueObjects\Money\Bridge\Twig\MoneyFormatterExtension: ~
```

## STEP 2: Use the extension in your Twig templates

### Using `localizedmoney` filter

When you know you are using the `MoneyInterface` object, then you use this filter:

```twig
{{ user.balance|localizedmoney }}
```

### Using `localizedmoneyfromarr` filter

When you don't have a `MoneyInterface` object but an `array` built to create a `MoneyInterface` object (like `$money = ['humanAmount' => 1000,00, 'currency' => 'EUR']`), then you can use the filter `localizedmoneyfromarr`: internally it first creates a `MoneyInterface` object and then formats it.

```twig
{{ user.balanceArray|localizedmoneyfromarr }}
```

*Do you like this library? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*
