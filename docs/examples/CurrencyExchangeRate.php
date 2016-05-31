<?php

require '../../vendor/autoload.php';

use SerendipityHQ\Component\ValueObjects\Currency\Currency;
use SerendipityHQ\Component\ValueObjects\CurrencyExchangeRate\CurrencyExchangeRate;

echo '<h1>Example usage of PHPValueObjects Currency.</h1>';

// ucfirst is applied automatically to find the right setter
$values = [
    'From' => new Currency('EUR'),
    'To' => new Currency('USD'),
    'ExchangeRate' => 1.1174,
    'ExchangeRateDate' => new \DateTime()
];

$currencyExchangeRate = new CurrencyExchangeRate($values);
dump($currencyExchangeRate);

echo '<h2>Helping methods</h2>';

echo 'Currency from' . $currencyExchangeRate->getFromCurrency() . "<br />\n";
echo 'Currency to' . $currencyExchangeRate->getToCurrency() . "<br />\n";
echo 'Exchange rate: ' . $currencyExchangeRate->getExchangeRate() . "<br />\n";
echo 'Exchange rate date: ' . $currencyExchangeRate->getExchangeRateDate()->format('Y-m-d H:i:s') . "<br />\n";
