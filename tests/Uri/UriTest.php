<?PHP

/**
 *  An Uri value object.
 *  This is just a wrapper for Zend Uri.
 *
 * @link https://github.com/zendframework/zend-uri
 *
 * @todo This has to be a Guzzle Uri or https://github.com/mvdbos/vdb-uri
 *
 * @package  Serendipity\Framework
 * @subpackage ValueObjects
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */

namespace SerendipityHQ\Component\ValueObjects\Tests\Uri;

use SerendipityHQ\Component\ValueObjects\Uri\Uri;

class UriTest extends \PHPUnit_Framework_TestCase
{
    public function testUri()
    {
        $test = 'http://example.com';

        $resource = new Uri($test);
    }
}
