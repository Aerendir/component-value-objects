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

use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Address\Address;
use SerendipityHQ\Component\ValueObjects\Address\AddressInterface;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Tests the Address class.
 */
class AddressTest extends TestCase
{
    public function testAddress()
    {
        $values = [
            'countryCode' => 'CN',
            'AdministrativeArea' => 'Taiwan',
            'Locality' => 'Taichung City',
            'dependentLocality' => 'Xitun District',
            'PostalCode' => '407',
            'Street' => 'Jingcheng Road, 27',
            'extraLine' => 'Lane 50',
        ];

        $resource = new Address($values);

        // Test the value object direct interface
        $this::assertInstanceOf(AddressInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        $this::assertSame($values['countryCode'], $resource->getCountryCode());
        $this::assertSame($values['AdministrativeArea'], $resource->getAdministrativeArea());
        $this::assertSame($values['Locality'], $resource->getLocality());
        $this::assertSame($values['dependentLocality'], $resource->getDependentLocality());
        $this::assertSame($values['PostalCode'], $resource->getPostalCode());
        $this::assertSame($values['Street'], $resource->getStreet());
        $this::assertSame($values['extraLine'], $resource->getExtraLine());
    }

    public function testToStringThrowsAnException()
    {
        $resource = new Address([]);

        $this::expectException(\RuntimeException::class);
        $resource->__toString();
    }
}
