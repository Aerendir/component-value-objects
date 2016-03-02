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
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * {@inheritdoc}
 */
class Currency extends BaseCurrency implements CurrencyInterface
{
    use DisableWritingMethodsTrait;

    /**
     * @param string $currencyCode
     */
    public function __construct($value)
    {
        parent::__construct($value);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return self::__toString();
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return parent::__toString();
    }
}
