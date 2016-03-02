<?PHP

/**
 *  An Email value object.
 *
 * This is inspired by the wowo Email Value Object
 * (https://gist.github.com/wowo/b49ac45b975d5c489214)
 *
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */
namespace SerendipityHQ\Component\ValueObjects\Tests\Email;

use SerendipityHQ\Component\ValueObjects\Email\Email;
use SerendipityHQ\Component\ValueObjects\Email\EmailInterface;
use SerendipityHQ\Component\ValueObjects\Common\SimpleValueObjectInterface;

/**
 * Tests the Email class.
 */
class EmailTest extends \PHPUnit_Framework_TestCase
{
    public function testEmail()
    {
        $test = 'user@example.com';

        $resource = new Email($test);

        // Test the value object direct interface
        $this->assertInstanceOf(EmailInterface::class, $resource);

        // Test the type of value object interface
        $this->assertInstanceOf(SimpleValueObjectInterface::class, $resource);

        $this->assertEquals($test, $resource->getEmail());
        $this->assertEquals('user', $resource->getMailBox());
        $this->assertEquals('example.com', $resource->getHost());
        $this->assertTrue(is_string($resource->toString()));
    }

    public function testInvalidEmailThrowsAnException()
    {
        $test = 'user-example';

        $this->expectException(\InvalidArgumentException::class);
        $resource = new Email($test);
    }

    public function testChangeMailBox()
    {
        $test = 'user@example.com';

        $resource = new Email($test);

        $result = $resource->changeMailBox('user2');

        $this->assertSame('user2@example.com', $result->getEmail());
        $this->assertNotSame($resource, $result);
    }
}
