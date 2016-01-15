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

use SerendipityHQ\Component\ValueObjects\Money\Money;

class MoneyTest extends \PHPUnit_Framework_TestCase
{
    public function testMoney()
    {
        $mocks['currency'] = $this->getMockBuilder('\SerendipityHQ\Component\ValueObjects\Currency\Currency')
            ->disableOriginalConstructor()
            ->getMock();

        $test = [
            'amount'   => 100,
            'currency' => $mocks['currency'],
            ];

        $resource = new Money($test['amount'], $test['currency']);
    }
}
