<?PHP

/**
 *  A Money value object.
 *
 * This is a simple wrapper for giggsey/libphonenumber-for-php
 * @link https://github.com/sebastianbergmann/money
 *
 * @package  Serendipity\Framework
 * @subpackage ValueObjects
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */

namespace SerendipityHQ\Framework\ValueObjects\Money;

use SerendipityHQ\Framework\ValueObjects\Currency\CurrencyInterface;

use SebastianBergmann\Money\Money as BaseMoney;

class Money extends BaseMoney implements MoneyInterface
{
    /**
     * @param int               $amount
     * @param CurrencyInterface $currency
     */
    public function __construct($amount, CurrencyInterface $currency)
    {
        parent::__construct($amount, $currency);
    }

    public function __toString()
    {
        return '';
    }

    public function __set($field, $value){}
}
