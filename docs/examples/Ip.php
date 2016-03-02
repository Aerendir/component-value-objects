<?php

require '../../vendor/autoload.php';

use SerendipityHQ\Component\ValueObjects\Ip\Ip;

echo '<h1>Example usage of PHPValueObjects Ip.</h1>';

// ucfirst is applied automatically to find the right setter
$value = '127.0.0.1';

$ip = new Ip($value);
dump($ip);

echo '<h2>Public methods</h2>';

echo 'Binary: ' . $ip->getBinary() . "<br />\n";
echo 'LongAddress: ' . $ip->getLongAddress() . "<br />\n";
echo 'Short Address: ' . $ip->getShortAddress() . "<br />\n";
echo 'Ip Version: ' . $ip->getVersion() . "<br />\n";
