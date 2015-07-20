<?PHP

/**
 *  A Money value object.
 *
 * This is a simple wrapper for giggsey/libphonenumber-for-php
 * (https://github.com/giggsey/libphonenumber-for-php)
 *
 * @package  Serendipity\Framework
 * @subpackage ValueObjects
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */

namespace SerendipityHQ\Framework\ValueObjects\Tests\Money;

use SerendipityHQ\Framework\ValueObjects\Money\Money;


class MoneyTest extends \PHPUnit_Framework_TestCase
{
    public function testMoney()
    {
        $mocks['currency'] = $this->getMockBuilder('\SerendipityHQ\Framework\ValueObjects\Currency\Currency')
            ->disableOriginalConstructor()
            ->getMock();

        $test = [
            'amount' => 100,
            'currency' => $mocks['currency']
            ];

        $resource = new Money($test['amount'], $test['currency']);
    }
}
