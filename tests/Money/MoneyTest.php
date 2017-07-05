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
namespace SerendipityHQ\Component\ValueObjects\tests\Money;

use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Currency\CurrencyInterface;
use SerendipityHQ\Component\ValueObjects\Money\Money;
use SerendipityHQ\Component\ValueObjects\Money\MoneyInterface;

class MoneyTest extends TestCase
{
    public function testMoney()
    {
        $test = [
            'amount' => 100,
            'currency' => 'EUR',
        ];

        $resource = new Money($test);

        // Test the value object direct interface
        $this::assertInstanceOf(MoneyInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        $this::assertSame('10000', $resource->getAmount());
        $this::assertTrue(is_string($resource->__toString()));
        $this::assertTrue(is_string($resource->toString()));
    }

    public function testMoneyTransformsStringsInIntAndStringsInCurrency()
    {
        $test = [
            'amount' => '100',
            'currency' => 'EUR',
        ];

        $resource = new Money($test);

        $this::assertSame('10000', $resource->getAmount());
    }
}
