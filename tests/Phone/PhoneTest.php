<?PHP

/**
 *  A Phone value object.
 *
 * This is a simple wrapper for giggsey/libphonenumber-for-php
 * (https://github.com/giggsey/libphonenumber-for-php)
 *
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */
namespace SerendipityHQ\Component\ValueObjects\Tests\Phone;

use SerendipityHQ\Component\ValueObjects\Phone\Phone;

class PhoneTest extends \PHPUnit_Framework_TestCase
{
    public function testPhone()
    {
        $test = '3331234567';

        $resource = new Phone($test);

        $this->assertInstanceOf('\SerendipityHQ\Component\ValueObjects\Phone\Phone', $resource);
    }
}
