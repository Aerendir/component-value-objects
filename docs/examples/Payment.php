<?php

require '../../vendor/autoload.php';

use SerendipityHQ\Component\ValueObjects\Payment\Payment;

echo '<h1>Example usage of PHPValueObjects Payment.</h1>';

// ucfirst is applied automatically to find the right setter
$values = [
    'method' => 'PayPal',
    'status' => 'Paid'
];

$payment = new Payment($values);
dump($payment);

echo '<h2>Public methods</h2>';

echo 'Method: ' . $payment->getMethod() . "<br />\n";
echo 'Status: ' . $payment->getStatus() . "<br />\n";
