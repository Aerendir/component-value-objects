<?php

require '../../vendor/autoload.php';

use SerendipityHQ\Component\ValueObjects\Uri\Uri;
use Zend\Uri\Uri as BaseUri;
use Zend\Uri\UriFactory;

$uri = 'http://example.com';
$email = 'ciao@example.com';

echo '<h1>Example usage of PHPValueObjects Uri.</h1>';

// ucfirst is applied automatically to find the right setter
$value = 'http://user@example.com:80/path/?query=string#fragment';

$uri = new Uri($value);
dump($uri);

echo '<h2>Public methods</h2>';

echo $value . "<br />\n";
echo 'Scheme: ' . $uri->getScheme() . "<br />\n";
echo 'User Info: ' . $uri->getUserInfo() . "<br />\n";
echo 'Host: ' . $uri->getHost() . "<br />\n";
echo 'Port: ' . $uri->getPort() . "<br />\n";
echo 'Path: ' . $uri->getPath() . "<br />\n";
echo 'Query string: ' . $uri->getQuery() . "<br />\n";
echo 'Fragment: ' . $uri->getFragment() . "<br />\n";

echo '<h1>Test original zend\Uri</h1>' . "\n\n";
echo '<h2>WITHOUT FACTORY</h2>' . "\n\n";
$email = 'ciao@example.com';
dump(new BaseUri($value));
dump(new BaseUri($email));

echo '<h2>WITH FACTORY</h2>' . "\n\n";
dump(UriFactory::factory($value));
dump(UriFactory::factory($email));

echo '<h2>WITH FACTORY AND MAILTO</h2>' . "\n\n";
dump(UriFactory::factory('mailto:' . $email));

echo '<h2>Make relative</h2>' . "\n\n";
$base = 'http://example.com/dir/subdir/';
$url = 'http://example.com/dir/subdir/more/file1.txt';
$expected = 'more/file1.txt';

$resource = new BaseUri($url);
dump($resource);
$resource->makeRelative($base);

dump($resource);
