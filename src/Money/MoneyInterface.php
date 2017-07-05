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
     * @param MoneyInterface $other
     *
     * @return static
     */
    public function add(MoneyInterface $other);

    /**
     * Returns the monetary value represented by this object.
     *
     * @return int
     */
    public function getAmount();

    /**
     * Returns the currency of the monetary value represented by this
     * object.
     *
     * @return \Money\Currency
     */
    public function getCurrency();
}
