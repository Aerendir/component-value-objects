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

namespace SerendipityHQ\Framework\ValueObjects\Tests\Currency;

use SerendipityHQ\Framework\ValueObjects\Currency\Currency;

class MoneyTest extends \PHPUnit_Framework_TestCase
{
    public function testCurrency()
    {
        $test = 'EUR';

        $resource = new Currency($test);
    }
}
