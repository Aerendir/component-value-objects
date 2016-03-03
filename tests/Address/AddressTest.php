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
namespace SerendipityHQ\Component\ValueObjects\tests\Address;

use \CommerceGuys\Addressing\Model\Address as BaseAddress;
use \CommerceGuys\Addressing\Model\AddressInterface as BaseAddressInterface;
use SerendipityHQ\Component\ValueObjects\Address\Address;
use SerendipityHQ\Component\ValueObjects\Address\AddressInterface;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Tests the Address class.
 */
class AddressTest extends \PHPUnit_Framework_TestCase
{
    public function testAddress()
    {
        $values = [
            'countryCode' => 'CN',
            'AdministrativeArea' => 'Taiwan',
            'Locality' => 'Taichung City',
            'dependentLocality' => 'Xitun District',
            'PostalCode' => '407',
            'SortingCode' => '',
            'AddressLine1' => 'Jingcheng Road, 27',
            'AddressLine2' => 'Lane 50',
            'Organization' => 'Aerendir Company',
            // Recipient's name and surname
            'Recipient' => 'Adamo Crespi',
            'locale' => 'it'
        ];

        $resource = new Address($values);

        // Test the value object direct interface
        $this->assertInstanceOf(AddressInterface::class, $resource);

        // Test the type of value object interface
        $this->assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        // Test inherits the base object interface
        $this->assertInstanceOf(BaseAddressInterface::class, $resource);

        // Test inherits the base object
        $this->assertInstanceOf(BaseAddress::class, $resource);

        $toString = $resource->__toString();
        $this->assertTrue(is_string($toString));
    }
}
