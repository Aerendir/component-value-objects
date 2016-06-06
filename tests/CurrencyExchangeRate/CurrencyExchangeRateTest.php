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

use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Currency\Currency;
use SerendipityHQ\Component\ValueObjects\CurrencyExchangeRate\CurrencyExchangeRate;
use SerendipityHQ\Component\ValueObjects\CurrencyExchangeRate\CurrencyExchangeRateInterface;

/**
 * Tests the CurrencyExchangeRate class.
 */
class CurrencyExchangeRateTest extends \PHPUnit_Framework_TestCase
{
    public function testCurrencyConversionRate()
    {
        $test = [
            'FromCurrency' => new Currency('EUR'),
            'ToCurrency' => new Currency('USD'),
            'ExchangeRate' => 1.1174,
            'ExchangeRateDate' => new \DateTime()
        ];

        $resource = new CurrencyExchangeRate($test);

        // Test the value object direct interface
        $this->assertInstanceOf(CurrencyExchangeRateInterface::class, $resource);

        // Test the type of value object interface
        $this->assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        $this->assertSame($test['FromCurrency'], $resource->getFromCurrency());
        $this->assertSame($test['ToCurrency'], $resource->getToCurrency());
        $this->assertSame($test['ExchangeRate'], $resource->getExchangeRate());
        $this->assertSame($test['ExchangeRateDate'], $resource->getExchangeRateDate());
    }

    public function testCurrencySetConversionRateAcceptsOnlyFloats()
    {
        $test = [
            'FromCurrency' => new Currency('EUR'),
            'ToCurrency' => new Currency('USD'),
            // This is an integer
            'ExchangeRate' => 11174,
            'ExchangeRateDate' => new \DateTime()
        ];

        $this->expectException(\InvalidArgumentException::class);
        $resource = new CurrencyExchangeRate($test);
    }
}
