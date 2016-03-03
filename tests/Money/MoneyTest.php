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
namespace SerendipityHQ\Component\ValueObjects\Tests\Money;

use SerendipityHQ\Component\ValueObjects\Currency\CurrencyInterface;
use SerendipityHQ\Component\ValueObjects\Money\Money;
use SerendipityHQ\Component\ValueObjects\Money\MoneyInterface;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;

class MoneyTest extends \PHPUnit_Framework_TestCase
{
    public function testMoney()
    {
        $mocks['currency'] = $this->getMockBuilder('\SerendipityHQ\Component\ValueObjects\Currency\Currency')
            ->disableOriginalConstructor()
            ->getMock();
        $mocks['currency']->method('getSubUnit')->willReturn(100);
        $mocks['currency']->method('getDefaultFractionDigits')->willReturn(2);

        $test = [
            'amount'   => 100,
            'currency' => $mocks['currency'],
            ];

        $resource = new Money($test);

        // Test the value object direct interface
        $this->assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        $this->assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        $this->assertSame($test['amount'], $resource->getAmount());
        $this->assertSame(1.0, $resource->getConvertedAmount());
        $this->assertTrue(is_string($resource->__toString()));
        $this->assertTrue(is_string($resource->toString()));
    }

    public function testMoneyTransformsStringsInIntAndStringsInCurrency()
    {
        $test = [
            'amount'   => '100',
            'currency' => 'EUR',
        ];

        $resource = new Money($test);

        $this->assertSame(100, $resource->getAmount());
        $this->assertInstanceOf(CurrencyInterface::class, $resource->getCurrency());
    }

    public function testAdd()
    {
        $mocks['currency'] = $this->getMockBuilder('\SerendipityHQ\Component\ValueObjects\Currency\Currency')
            ->disableOriginalConstructor()
            ->getMock();
        $mocks['currency']->method('getSubUnit')->willReturn(100);
        $mocks['currency']->method('getDefaultFractionDigits')->willReturn(2);

        $test = [
            'amount'   => 100,
            'currency' => $mocks['currency'],
        ];

        $resource = new Money($test);
        $toAdd = new Money($test);

        $result = $resource->add($toAdd);

        // Test the value object direct interface
        $this->assertInstanceOf(MoneyInterface::class, $result);

        // Test the type of value object interface
        $this->assertInstanceOf(ComplexValueObjectInterface::class, $result);

        $this->assertInstanceOf(CurrencyInterface::class, $result->getCurrency());
        $this->assertEquals(200, $result->getAmount());
    }

    public function testSubtract()
    {
        $mocks['currency'] = $this->getMockBuilder('\SerendipityHQ\Component\ValueObjects\Currency\Currency')
            ->disableOriginalConstructor()
            ->getMock();
        $mocks['currency']->method('getSubUnit')->willReturn(100);
        $mocks['currency']->method('getDefaultFractionDigits')->willReturn(2);

        $test = [
            'amount'   => 100,
            'currency' => $mocks['currency'],
        ];

        $resource = new Money($test);
        $toAdd = new Money($test);

        $result = $resource->subtract($toAdd);

        // Test the value object direct interface
        $this->assertInstanceOf(MoneyInterface::class, $result);

        // Test the type of value object interface
        $this->assertInstanceOf(ComplexValueObjectInterface::class, $result);

        $this->assertInstanceOf(CurrencyInterface::class, $result->getCurrency());
        $this->assertEquals(0, $result->getAmount());
    }
}
