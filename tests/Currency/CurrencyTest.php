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

class CurrencyTest extends \PHPUnit_Framework_TestCase
{
    public function testCurrency()
    {
        $test = 'EUR';

        $resource = new Currency($test);

        $this->assertInstanceOf('\SerendipityHQ\Component\ValueObjects\Currency\Currency', $resource);
    }
}
