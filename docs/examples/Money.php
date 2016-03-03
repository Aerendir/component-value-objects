<?php

require '../../vendor/autoload.php';

use SerendipityHQ\Component\ValueObjects\Money\Money;

echo '<h1>Example usage of PHPValueObjects Money.</h1>';

// ucfirst is applied automatically to find the right setter
$values = [
    'amount'   => 300,
    'currency' => 'EUR'
];

$money = new Money($values);
dump($money);

echo '<h2>Public methods</h2>';

echo 'Amount: ' . $money->getAmount() . "<br />\n";
echo 'Converted amount: ' . $money->getConvertedAmount() . "<br />\n";
echo 'Currency: ' . $money->getCurrency()->getCurrencyCode();

$newValues = [
    'amount'   => 200,
    'currency' => $money->getCurrency()
];
$newMoney = new Money($newValues);

$sum = $money->add($newMoney);

dump('Sum of Money objects', $sum);

$sub = $money->subtract($newMoney);

dump('Sub of Money objects', $sub);
