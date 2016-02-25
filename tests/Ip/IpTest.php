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

class IpTest extends \PHPUnit_Framework_TestCase
{
    public function testIpImplementsIpInterface()
    {
        $resource = new Ip('127.0.0.1');

        $this->assertInstanceOf(IpInterface::class, $resource);
    }

    public function testIpExtendsIp()
    {
        $resource = new Ip('127.0.0.1');

        $this->assertInstanceOf(BaseIp::class, $resource);
    }
}
