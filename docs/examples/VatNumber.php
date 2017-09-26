<?php

require '../../vendor/autoload.php';

use SerendipityHQ\Component\ValueObjects\Vat\VatNumber;

echo '<h1>Example usage of PHPValueObjects VatNumber.</h1>';

// ucfirst is applied automatically to find the right setter
$values = [
    'countryCode' => 'IT',
    'number' => '01234567891',
    'vatNumber' => 'IT01234567891'
];

$vatNumber = new VatNumber($values);
dump($vatNumber);

echo '<h2>Public methods</h2>';

echo 'Country Code: ' . $vatNumber->getCountryCode() . "<br />\n";
echo 'Number: ' . $vatNumber->getNumber() . "<br />\n";
echo 'VAT Number: ' . $vatNumber->getVatNumber() . "<br />\n";
