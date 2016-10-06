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
namespace SerendipityHQ\Component\ValueObjects\tests\Money\Persistence;

use SerendipityHQ\Component\ValueObjects\Money\Money;

/**
 * @author Adamo Crespi <hello@aerendir.me>
 */
class MoneyTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testMoneyType()
    {
        $this->markTestSkipped('See http://stackoverflow.com/questions/39900136/how-to-test-doctrine-custom-types');
    }
}
