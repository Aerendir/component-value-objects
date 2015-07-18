<?PHP

/**
 *  A Phone value object.
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

namespace SerendipityHQ\Framework\ValueObjects\Phone;

use SerendipityHQ\Framework\ValueObjects\Phone\PhoneInterface;

use libphonenumber\PhoneNumber;
use libphonenumber\PhoneNumberUtil;

class Phone extends PhoneNumber implements PhoneInterface
{
    protected $phone;

    public function __construct($phone = null, $region = 'IT')
    {
        if (is_string($phone))
        {
            $phoneUtil = PhoneNumberUtil::getInstance();
            $phone = $phoneUtil->parse($phone, $region);
        }

        if ($phone instanceof PhoneNumber)
        {
            $this->mergeFrom($phone);
        }
    }

    public function __set($field, $value){}
}
