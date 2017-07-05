<?PHP

/**
 *  A Phone value object.
 *
 * This is a simple wrapper for giggsey/libphonenumber-for-php
 * (https://github.com/giggsey/libphonenumber-for-php)
 *
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */
namespace SerendipityHQ\Component\ValueObjects\tests\Phone;

use libphonenumber\PhoneNumber as BasePhone;
use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Phone\Phone;
use SerendipityHQ\Component\ValueObjects\Phone\PhoneInterface;

/**
 * Tests the Phone class.
 */
class PhoneTest extends TestCase
{
    public function testPhone()
    {
        $test = [
            'number' => '3331234567',
            'region' => 'IT'
        ];

        $resource = new Phone($test);

        // Test the value object direct interface
        $this::assertInstanceOf(PhoneInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        // Test inherits the base object
        $this::assertInstanceOf(BasePhone::class, $resource);

        $this::assertTrue(is_string($resource->__toString()));
        $this::assertTrue(is_string($resource->toString()));
    }
}
