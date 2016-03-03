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

use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Defines the minimum requirements of a Money object.
 *
 * {@inheritdoc}
 */
interface MoneyInterface extends ComplexValueObjectInterface
{
    /**
     * @param Money $other
     *
     * @return static
     */
    public function add(Money $other);

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

    /**
     * @param Money $other
     *
     * @return static
     */
    public function subtract(Money $other);
}
