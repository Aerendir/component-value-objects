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

namespace SerendipityHQ\Framework\ValueObjects\Money;

use SebastianBergmann\Money\Money as BaseMoney;

class Money extends BaseMoney implements MoneyInterface
{
    protected $money;

    public function __construct($options = null)
    {
    }

    public function __toString()
    {
        return '';
    }

    public function __set($field, $value){}
}
