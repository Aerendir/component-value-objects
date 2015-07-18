<?PHP

/**
 *  An Email value object.
 *
 * This is inspired by the wowo Email Value Object
 * (https://gist.github.com/wowo/b49ac45b975d5c489214)
 *
 * @package  Serendipity\Framework
 * @subpackage ValueObjects
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */

namespace SerendipityHQ\Framework\ValueObjects\Tests\Email;

use SerendipityHQ\Framework\ValueObjects\Email\Email;

class EmailTest extends \PHPUnit_Framework_TestCase
{
    public function testEmail()
    {
        $test = 'user@example.com';

        $resource = new Email($test);

        $this->assertEquals($test, $resource->getEmail());
    }
}
