<?php

require('../vendor/autoload.php');

use Zend\Uri\Uri;
use Zend\Uri\UriFactory;

$uri = 'http://example.com';
$email = 'ciao@example.com';

echo 'WITHOUT FACTORY'."\n\n";
print_r(new Uri($uri));
print_r(new Uri($email));

echo 'WITH FACTORY'."\n\n";
print_r(UriFactory::factory($uri));
print_r(UriFactory::factory($email));

echo 'WITH FACTORY AND MAILTO'."\n\n";
print_r(UriFactory::factory('mailto:'.$email));