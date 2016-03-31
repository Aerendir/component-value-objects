<?PHP

/**
 *  A Money value object.
 *
 * This is a simple wrapper for giggsey/libphonenumber-for-php
 * (https://github.com/giggsey/libphonenumber-for-php)
 *
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */
namespace SerendipityHQ\Component\ValueObjects\tests\Currency;

use SebastianBergmann\Money\Currency as BaseCurrency;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Currency\Currency;
use SerendipityHQ\Component\ValueObjects\Currency\CurrencyInterface;

/**
 * Tests the Currency class.
 */
class CurrencyTest extends \PHPUnit_Framework_TestCase
{
    public function testCurrency()
    {
        $test = [
            'ConversionRate' => 1.1174,
            'IsoCode' => 'EUR',
        ];

        $resource = new Currency($test);

        // Test the value object direct interface
        $this->assertInstanceOf(CurrencyInterface::class, $resource);

        // Test the type of value object interface
        $this->assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        // Test inherits the base object
        $this->assertInstanceOf(BaseCurrency::class, $resource);

        $this->assertTrue(is_string($resource->__toString()));
        $this->assertTrue(is_string($resource->toString()));
        $this->assertSame($test['ConversionRate'], $resource->getConversionRate());
        $this->assertSame($test['IsoCode'], $resource->getIsoCode());
    }
    
    public function testConstructorThrowsInvalidArgumentExceptionIfIsoCodeIsMissed()
    {
        $test = [
            // This is an integer
            'ConversionRate' => 1.1174,
        ];

        $this->expectException(\InvalidArgumentException::class);
        $resource = new Currency($test);
    }

    public function testSetConversionRateAcceptsOnlyFloats()
    {
        $test = [
            'IsoCode' => 'EUR',
            // This is an integer
            'ConversionRate' => 11174,
        ];

        $this->expectException(\InvalidArgumentException::class);
        $resource = new Currency($test);
    }
}
