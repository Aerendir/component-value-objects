<?php

require '../../vendor/autoload.php';

use CommerceGuys\Addressing\Repository\AddressFormatRepository;
use CommerceGuys\Addressing\Repository\SubdivisionRepository;
use SerendipityHQ\Component\ValueObjects\Address\Address;

echo '<h1>Example usage of PHPValueObjects Address.</h1>';

// ucfirst is applied automatically to find the right setter
$values = [
    'countryCode' => 'IT',
    'AdministrativeArea' => 'SA',
    'Locality' => 'Nocera Inferiore',
    'dependentLocality' => '',
    'PostalCode' => '84014',
    'Street' => 'Piazza la bomba e scappa',
    'ExtraLine' => 'Non ce l\'hai fatta'
];

$address = new Address($values);
dump($address);

/**
 * As the Value Object doesn't extend Commerceguys/Address library anymore, these features are not longer avaialable.
 *
 * To get them, use commerceguys/addressing and commerceguys/intl.
 */

/*
echo '<h1>Format the address: US</h1>';

echo '<h2>Default options</h2>';
echo $address->toString();

echo '<h2>Without HTML</h2>';
echo $address->toString(['html' => false]);

echo '<h2>In another locale: DE</h2>';
echo $address->toString(['locale' => 'DE']);

echo '<h2>Using the "pre" tag</h2>';
echo $address->toString(['html_tag' => 'pre']);

echo '<h1>Example usage of PHPValueObjects Address with chineese addresses.</h1>';

// ucfirst is applied automatically to find the right setter
$values = [
    'countryCode' => 'CN',
    'AdministrativeArea' => 'Taiwan',
    'Locality' => 'Taichung City',
    'dependentLocality' => 'Xitun District',
    'PostalCode' => '407',
    'SortingCode' => '',
    'AddressLine1' => 'Jingcheng Road, 27',
    'AddressLine2' => 'Lane 50',
    'Organization' => 'Aerendir Company',
    // Recipient's name and surname
    'Recipient' => 'Adamo Crespi',
    'locale' => 'it'
];

$address = new Address($values);
dump($address);

echo '<h2>In another locale: IT</h2>';
echo $address->toString(['locale' => 'IT']);

echo '<h1>Some other useful features of the CommerceGuys/Addressing library</h1>';
$addressFormatRepository = new AddressFormatRepository();
$subdivisionRepository = new SubdivisionRepository();

// Get the address format for Brazil.
$addressFormat = $addressFormatRepository->get('IT');

// Get the subdivisions for Brazil.
$states = $subdivisionRepository->getAll('IT');
foreach ($states as $state) {
    $municipalities = $state->getChildren();
}

// Get the subdivisions for Canada, in French.
$states = $subdivisionRepository->getAll('IT', 0, 'fr');
foreach ($states as $state) {
    echo $state->getName();
}
*/
