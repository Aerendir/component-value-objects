<?php

require '../../vendor/autoload.php';

use SerendipityHQ\Component\ValueObjects\Money\Money;
use SerendipityHQ\Component\ValueObjects\Tax\Tax;

echo '<h1>Example usage of PHPValueObjects Tax.</h1>';

// ucfirst is applied automatically to find the right setter
$values = [
    'amount' => new Money(['amount' => 200, 'currency' => 'EUR']),
    'code' => 'IVA IT',
    'compound' => new Money(['amount' => 100, 'currency' => 'EUR']),
    'rate' => 22.0,
    'title' => 'IVA Italiana'
];

$tax = new Tax($values);
dump($tax);

echo '<h2>Public methods</h2>';

echo 'Amount: ' . $tax->getAmount() . "<br />\n";
echo 'Amount Currency: ' . $tax->getAmount()->getCurrency()->getCode() . "<br />\n";
echo 'Code: ' . $tax->getCode() . "<br />\n";
echo 'Compound: ' . $tax->getCompound() . "<br />\n";
echo 'Rate: ' . $tax->getRate() . "<br />\n";
echo 'Title: ' . $tax->getTitle() . "<br />\n";
