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
namespace SerendipityHQ\Component\ValueObjects\Tests\Currency;

use SerendipityHQ\Component\ValueObjects\Currency\Currency;
use SerendipityHQ\Component\ValueObjects\Currency\CurrencyInterface;
use SebastianBergmann\Money\Currency as BaseCurrency;
use SerendipityHQ\Component\ValueObjects\Common\SimpleValueObjectInterface;

/**
 * Tests the Currency class.
 */
class CurrencyTest extends \PHPUnit_Framework_TestCase
{
    public function testCurrency()
    {
        $test = 'EUR';

        $resource = new Currency($test);

        // Test the value object direct interface
        $this->assertInstanceOf(CurrencyInterface::class, $resource);

        // Test the type of value object interface
        $this->assertInstanceOf(SimpleValueObjectInterface::class, $resource);

        // Test inherits the base object
        $this->assertInstanceOf(BaseCurrency::class, $resource);

        $this->assertTrue(is_string($resource->__toString()));
        $this->assertTrue(is_string($resource->toString()));
    }
}
