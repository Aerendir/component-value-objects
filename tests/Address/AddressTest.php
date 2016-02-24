<?PHP

/**
 *  An Address value object.
 *
 * This Value Object use commerceguys/addressing library
 * (https://github.com/commerceguys/addressing).
 *
 * Other useful libraries:
 * - https://github.com/black-project/Address
 * - https://github.com/adamlc/address-format
 *
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */
namespace SerendipityHQ\Component\ValueObjects\Tests\Address;

use \CommerceGuys\Addressing\Model\AddressInterface as BaseAddressInterface;
use SerendipityHQ\Component\ValueObjects\Address\Address;
use SerendipityHQ\Component\ValueObjects\Address\AddressInterface;

class AddressTest extends \PHPUnit_Framework_TestCase
{
    public function testAddress()
    {
        $options = [
            'locale' => 'en_EN',
            ];

        $resource = new Address($options);

        $this->assertInstanceOf(AddressInterface::class, $resource);
        $this->assertInstanceOf(BaseAddressInterface::class, $resource);
    }
}
