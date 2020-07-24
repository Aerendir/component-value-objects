*Do you like this library? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*

Phone Complex Value Object
==========================

Represents a phone number value.

## Base Phone signature

```php
// vendor/giggsey/libphone-number-for-php/src/libphonenumber/PhoneNumberUtil.php

/**
 * Parses a string and returns it in proto buffer format. This method will throw a
 * {@link NumberParseException} if the number is not considered to be
 * a possible number. Note that validation of whether the number is actually a valid number for a
 * particular region is not performed. This can be done separately with {@link #isValidNumber}.
 *
 * @param string $numberToParse number that we are attempting to parse. This can contain formatting
 *                          such as +, ( and -, as well as a phone number extension.
 * @param string $defaultRegion region that we are expecting the number to be from. This is only used
 *                          if the number being parsed is not written in international format.
 *                          The country_code for the number in this case would be stored as that
 *                          of the default region supplied. If the number is guaranteed to
 *                          start with a '+' followed by the country calling code, then
 *                          "ZZ" or null can be supplied.
 * @param PhoneNumber|null $phoneNumber
 * @param bool $keepRawInput
 * @return PhoneNumber a phone number proto buffer filled with the parsed number
 * @throws NumberParseException  if the string is not considered to be a viable phone number or if
 *                               no default region was supplied and the number is not in
 *                               international format (does not start with +)
 */
public function parse($numberToParse, $defaultRegion, PhoneNumber $phoneNumber = null, $keepRawInput = false)
```

## How to use the object

See the working example: [examples/Phone.php](examples/Phone.php).

```php
// ucfirst is applied automatically to find the right setter
$values = [
    'number' => '3493534998',
    'region' => 'IT',
];

$phone = new Phone($values);
dump($phone);
```

*Do you like this library? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*
