<?PHP

/**
 *  A Currency value object.
 *
 * This is a simple wrapper for giggsey/libphonenumber-for-php
 *
 * @link https://github.com/sebastianbergmann/money
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */
namespace SerendipityHQ\Component\ValueObjects\Currency;

use SebastianBergmann\Money\Currency as BaseCurrency;

class Currency extends BaseCurrency implements CurrencyInterface
{
    public function __construct($currencyCode)
    {
        parent::__construct($currencyCode);
    }

    public function __toString()
    {
        return self::getCurrencyCode();
    }

    public function __set($field, $value)
    {
    }
}
