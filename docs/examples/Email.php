<?php

require '../../vendor/autoload.php';

use SerendipityHQ\Component\ValueObjects\Email\Email;

echo '<h1>Example usage of PHPValueObjects Email.</h1>';

// ucfirst is applied automatically to find the right setter
$value = 'user@example.com';

$email = new Email($value);
dump($email);

echo '<h2>Helping methods</h2>';

echo 'Email: ' . $email->getEmail() . "<br />\n";
echo 'Mail box: ' . $email->getMailBox() . "<br />\n";
echo 'Host: ' . $email->getHost() . "<br />\n";
echo 'String: ' . $email->toString() . "<br />\n";

echo '<h2>Change mailbox</h2>';

$newEmail = $email->changeMailBox('user2');
echo 'Email: ' . $newEmail->getEmail() . "<br />\n";
