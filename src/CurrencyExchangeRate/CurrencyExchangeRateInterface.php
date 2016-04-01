<?PHP

/**
 *  A Phone value object.
 *
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */
namespace SerendipityHQ\Component\ValueObjects\CurrencyExchangeRate;

use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Currency\CurrencyInterface;

/**
 * Defines the minimum requisites of a Currency object.
 *
 * {@inheritdoc}
 */
interface CurrencyExchangeRateInterface extends ComplexValueObjectInterface
{
    /**
     * Get the conversion rate.
     *
     * This is not retrieved from some sources but set when creating the object.
     * So it may be not updated.
     *
     * @return float
     */
    public function getExchangeRate();

    /**
     * The date on which the exchange rate were given.
     *
     * @return \DateTime
     */
    public function getExchangeRateDate();

    /**
     * Get the base Currency the amount is in.
     * 
     * @return CurrencyInterface
     */
    public function getFrom();

    /**
     * Get the Currency in which convert the amount.
     * 
     * @return CurrencyInterface
     */
    public function getTo();
}
