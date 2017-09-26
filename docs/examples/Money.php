<?php

require '../../vendor/autoload.php';

use SerendipityHQ\Component\ValueObjects\Money\Money;

echo '<h1>Example usage of PHPValueObjects Money.</h1>';
echo '<h2>Base units (305).</h2>';
$baseValues = [
    // This represents 3.05 Euros
    'baseAmount' => 305,
    'currency' => 'EUR'
];

$baseMoney = new Money($baseValues);
dump($baseMoney);

echo 'Base Amount: ' . $baseMoney->getBaseAmount() . "<br />\n";
echo 'Human amount: ' . $baseMoney->getHumanAmount() . "<br />\n";
echo 'Currency: ' . $baseMoney->getCurrency()->getCode();

echo '<h2><code>(int) 30</code> (Represents 30 Euro).</h2>';
$floatValues = [
    'humanAmount' => 30,
    'currency' => 'EUR'
];

$floatMoney = new Money($floatValues);
dump($floatMoney);

echo 'Base Amount: ' . $floatMoney->getBaseAmount() . "<br />\n";
echo 'Human amount: ' . $floatMoney->getHumanAmount() . "<br />\n";
echo 'Currency: ' . $floatMoney->getCurrency()->getCode();

echo '<h2><code>(float) 30.50</code> (HAS decimal values).</h2>';
$floatValues = [
    'humanAmount' => 30.50,
    'currency' => 'EUR'
];

$floatMoney = new Money($floatValues);
dump($floatMoney);

echo 'Base Amount: ' . $floatMoney->getBaseAmount() . "<br />\n";
echo 'Human amount: ' . $floatMoney->getHumanAmount() . "<br />\n";
echo 'Currency: ' . $floatMoney->getCurrency()->getCode();

echo '<h2><code>(float) 30.00</code> (HAS NOT decimal values).</h2>';
$floatValues = [
    'humanAmount' => 30.00,
    'currency' => 'EUR'
];

$floatMoney = new Money($floatValues);
dump($floatMoney);

echo 'Base Amount: ' . $floatMoney->getBaseAmount() . "<br />\n";
echo 'Human amount: ' . $floatMoney->getHumanAmount() . "<br />\n";
echo 'Currency: ' . $floatMoney->getCurrency()->getCode();

echo '<h2><code>(string/int) 12</code> (Represents 12 Euro).</h2>';
$stringValues = [
    'humanAmount' => '12',
    'currency' => 'EUR'
];

$stringMoney = new Money($stringValues);
dump($stringMoney);

echo 'Base Amount: ' . $stringMoney->getBaseAmount() . "<br />\n";
echo 'Human amount: ' . $stringMoney->getHumanAmount() . "<br />\n";
echo 'Currency: ' . $stringMoney->getCurrency()->getCode();

echo '<h2><code>(string/float) 12.34</code> (IS float and HAS decimal values).</h2>';
$stringValues = [
    'humanAmount' => '12.34',
    'currency' => 'EUR'
];

$stringMoney = new Money($stringValues);
dump($stringMoney);

echo 'Base Amount: ' . $stringMoney->getBaseAmount() . "<br />\n";
echo 'Human amount: ' . $stringMoney->getHumanAmount() . "<br />\n";
echo 'Currency: ' . $stringMoney->getCurrency()->getCode();

echo '<h2><code>(string/float) 12.00</code> (IS float and HAS NOT decimal values).</h2>';
$stringValues = [
    'humanAmount' => '12.00',
    'currency' => 'EUR'
];

$stringMoney = new Money($stringValues);
dump($stringMoney);

echo 'Base Amount: ' . $stringMoney->getBaseAmount() . "<br />\n";
echo 'Human amount: ' . $stringMoney->getHumanAmount() . "<br />\n";
echo 'Currency: ' . $stringMoney->getCurrency()->getCode();

echo '<h2><code>(string/float) 12,34</code> (IS float, HAS decimal values and uses "," - comma - as decimal separator).</h2>';
$stringValues = [
    'humanAmount' => '12,34',
    'currency' => 'EUR'
];

$stringMoney = new Money($stringValues);
dump($stringMoney);

echo 'Base Amount: ' . $stringMoney->getBaseAmount() . "<br />\n";
echo 'Human amount: ' . $stringMoney->getHumanAmount() . "<br />\n";
echo 'Currency: ' . $stringMoney->getCurrency()->getCode();

echo '<h2>Operations</h2>';
echo '<h3>Sum (12.45 Euro + 3.32 Euro = 15.77 Euro)</h3>';
$first = [
    // This represents 3.05 Euros
    'humanAmount' => 12.45,
    'currency' => 'EUR'
];
$firstMoney = new Money($first);

$second = [
    'humanAmount' => '3,32',
    'currency' => 'EUR'
];
$secondMoney = new Money($second);

$sum = $firstMoney->add($secondMoney);

dump($sum);
echo 'Base Amount: ' . $sum->getBaseAmount() . "<br />\n";
echo 'Human amount: ' . $sum->getHumanAmount() . "<br />\n";
echo 'Currency: ' . $sum->getCurrency()->getCode();

echo '<h3>Subtract (15.77 Euro - 12.45 Euro = 3.32 Euro)</h3>';
$sub = $sum->subtract($firstMoney);

dump($sub);
echo 'Base Amount: ' . $sub->getBaseAmount() . "<br />\n";
echo 'Human amount: ' . $sub->getHumanAmount() . "<br />\n";
echo 'Currency: ' . $sub->getCurrency()->getCode();
