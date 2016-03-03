<?php

require '../../vendor/autoload.php';

use SerendipityHQ\Component\ValueObjects\Phone\Phone;

echo '<h1>Example usage of PHPValueObjects Phone.</h1>';

// ucfirst is applied automatically to find the right setter
$values = [
    'number' => '3493534998',
    'region' => 'IT',
];

$phone = new Phone($values);
dump($phone);

echo '<h2>Keep Raw Input</h2>';
$values = [
    'number' => '3493534998',
    'region' => 'IT',
    'keepRawInput' => true
];

$phone = new Phone($values);
dump($phone);

echo '<h2>Public methods</h2>';

echo 'Phone number (RAW): ' . $phone->getRawInput() . "<br />\n";
echo 'Country code: ' . $phone->getCountryCode() . "<br />\n";
echo 'Country code source: ' . $phone->getCountryCodeSource() . "<br />\n";
echo 'Extension: ' . $phone->getExtension() . "<br />\n";
echo 'National number: ' . $phone->getNationalNumber() . "<br />\n";
echo 'Number of leading zeros: ' . $phone->getNumberOfLeadingZeros() . "<br />\n";
echo 'Preferred domestic carrier code: ' . $phone->getPreferredDomesticCarrierCode() . "<br />\n";
