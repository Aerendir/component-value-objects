<?php

require '../vendor/autoload.php';

use CommerceGuys\Addressing\Repository\AddressFormatRepository;
use CommerceGuys\Addressing\Repository\SubdivisionRepository;

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
