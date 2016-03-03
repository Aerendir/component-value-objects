<?php

require '../../vendor/autoload.php';

use SerendipityHQ\Component\ValueObjects\Currency\Currency;

echo '<h1>Example usage of PHPValueObjects Currency.</h1>';

// ucfirst is applied automatically to find the right setter
$value = 'EUR';

$currency = new Currency($value);
dump($currency);

echo '<h2>Helping methods</h2>';

echo 'Currency code: ' . $currency->getCurrencyCode() . "<br />\n";
echo 'Default fraction digit: ' . $currency->getDefaultFractionDigits() . "<br />\n";
echo 'Display name: ' . $currency->getDisplayName() . "<br />\n";
echo 'Numeric code: ' . $currency->getNumericCode() . "<br />\n";
echo 'Sub unit: ' . $currency->getSubUnit() . "<br />\n";
