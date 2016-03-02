<?PHP

/**
 *  An IP value object.
 *  This is just a wrapper for Darsyn\IP\IP.
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */
namespace SerendipityHQ\Component\ValueObjects\Tests\Ip;

use Darsyn\IP\IP as BaseIp;
use SerendipityHQ\Component\ValueObjects\Ip\Ip;
use SerendipityHQ\Component\ValueObjects\Ip\IpInterface;
use SerendipityHQ\Component\ValueObjects\Common\SimpleValueObjectInterface;

/**
 * Tests the Ip class.
 */
class IpTest extends \PHPUnit_Framework_TestCase
{
    public function testIp()
    {
        $test = '127.0.0.1';

        $resource = new Ip($test);

        // Test the value object direct interface
        $this->assertInstanceOf(IpInterface::class, $resource);

        // Test the type of value object interface
        $this->assertInstanceOf(SimpleValueObjectInterface::class, $resource);

        // Test inherits the base object
        $this->assertInstanceOf(BaseIp::class, $resource);

        $this->assertTrue(is_string($resource->toString()));
    }

    public function testIpThrowsAnExceptionIfIpIsInvalid()
    {
        $test = 'invalid-ip';

        $this->expectException(\InvalidArgumentException::class);
        $resource = new Ip($test);
    }
}
