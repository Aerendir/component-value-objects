<?php

require '../../vendor/autoload.php';

use SerendipityHQ\Component\ValueObjects\Vat\VatRate;

echo '<h1>Example usage of PHPValueObjects VatRate.</h1>';

$vat = new VatRate('IT');
dump($vat);

echo '<h2>Public methods</h2>';

echo 'Country Code: ' . $vat->getCountryCode() . "<br />\n";
echo 'Percentage: ' . $vat->getPercentage() . "<br />\n";
