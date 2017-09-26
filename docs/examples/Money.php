<?php

require '../../vendor/autoload.php';

use SerendipityHQ\Component\ValueObjects\Money\Money;
use \SebastianBergmann\Money\Money as BaseMoney;

echo '<h1>Example usage of PHPValueObjects Money.</h1>';
echo '<h2>Base units (305).</h2>';
// ucfirst is applied automatically to find the right setter
$baseValues = [
    // This represents 3.00 Euros
    'amount' => 305,
    'currency' => 'EUR'
];

$baseMoney = new Money($baseValues);
dump($baseMoney);

echo 'Amount: ' . $baseMoney->getAmount() . "<br />\n";
echo 'Base amount: ' . $baseMoney->getBaseAmount() . "<br />\n";
echo 'Currency: ' . $baseMoney->getCurrency()->getCurrencyCode();

echo '<h2>String (\'12.34\').</h2>';
// ucfirst is applied automatically to find the right setter
$stringValues = [
    // This represents 3.00 Euros
    'amount' => '12.34',
    'currency' => 'EUR'
];

$stringMoney = new Money($stringValues);
dump('string', $stringMoney);

echo 'Amount: ' . $stringMoney->getAmount() . "<br />\n";
echo 'Base amount: ' . $stringMoney->getBaseAmount() . "<br />\n";
echo 'Currency: ' . $stringMoney->getCurrency()->getCurrencyCode();

echo '<h2>Float (30.50).</h2>';
// ucfirst is applied automatically to find the right setter
$floatValues = [
    // This represents 3.00 Euros
    'amount' => 30.50,
    'currency' => 'EUR'
];

$floatMoney = new Money($floatValues);
dump($floatMoney);

echo 'Amount: ' . $floatMoney->getAmount() . "<br />\n";
echo 'Base amount: ' . $floatMoney->getBaseAmount() . "<br />\n";
echo 'Currency: ' . $floatMoney->getCurrency()->getCurrencyCode();

echo '<h2>Public methods</h2>';

// ucfirst is applied automatically to find the right setter
$values = [
    // This represents 3.00 Euros
    'amount' => 305,
    'currency' => 'EUR'
];

$money = new Money($values);
dump($money);

echo 'Amount: ' . $money->getAmount() . "<br />\n";
echo 'Base amount: ' . $money->getBaseAmount() . "<br />\n";
echo 'Currency: ' . $money->getCurrency()->getCode();

$newValues = [
    'amount' => 200,
    'currency' => $money->getCurrency()
];
$newMoney = new Money($newValues);

$sum = $money->add($newMoney);

dump('Sum of Money objects', $sum);

$sub = $money->subtract($newMoney);

dump('Sub of Money objects', $sub);

echo '<h1>Example usage of Sebastian Money.</h1>';

$sebMoney = BaseMoney::fromString('12.34', 'EUR');

dump($sebMoney);
