<?PHP

/**
 *  A Phone value object.
 *
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */
namespace SerendipityHQ\Component\ValueObjects\Currency;

use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Defines the minimum requisites of a Currency object.
 *
 * {@inheritdoc}
 */
interface CurrencyInterface extends ComplexValueObjectInterface
{
    /**
     * Get the conversion rate.
     *
     * This is not retrieved from some sources but set when creating the object.
     * So it may be not updated.
     *
     * @return float
     */
    public function getConversionRate();

    /**
     * The currency code.
     *
     * @return string
     */
    public function getCurrencyCode();

    /**
     * The currency code.
     *
     * This is a wrapper for getCurrencyCode().
     *
     * @return string
     */
    public function getIsoCode();
}
