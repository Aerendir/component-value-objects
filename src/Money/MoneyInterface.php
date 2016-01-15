<?PHP

/**
 *  A Phone value object.
 *
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */
namespace SerendipityHQ\Component\ValueObjects\Money;

use SerendipityHQ\Component\ValueObjects\Common\ValueObjectInterface;

interface MoneyInterface extends ValueObjectInterface
{
    /**
     * Returns the monetary value represented by this object.
     *
     * @return int
     */
    public function getAmount();

    /**
     * return the monetary value represented by this object converted to its base units.
     *
     * @return float
     */
    public function getConvertedAmount();

    /**
     * Returns the currency of the monetary value represented by this
     * object.
     *
     * @return \SebastianBergmann\Money\Currency
     */
    public function getCurrency();
}
