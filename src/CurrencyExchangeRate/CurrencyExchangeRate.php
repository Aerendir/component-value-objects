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
namespace SerendipityHQ\Component\ValueObjects\CurrencyExchangeRate;

use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectTrait;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;
use SerendipityHQ\Component\ValueObjects\Currency\CurrencyInterface;

/**
 * {@inheritdoc}
 */
class CurrencyExchangeRate implements CurrencyExchangeRateInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    private $exchangeRate;
    private $exchangeRateDate;
    private $from;
    private $to;

    /**
     * Required parameters are:
     * 
     * - From: The Currency in which the amount is;
     * - To: The Currency in which the amount is converted/exchanged;
     * - ExchangeRate: The rate of the exchanging/conversion.
     * 
     * @param array $values
     */
    public function __construct(array $values)
    {
        $this->traitConstruct($values);
    }

    /**
     * {@inheritdoc}
     */
    public function getExchangeRate()
    {
        return $this->exchangeRate;
    }

    /**
     * {@inheritdoc}
     */
    public function getExchangeRateDate()
    {
        return $this->exchangeRateDate;
    }

    /**
     * {@inheritdoc}
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * {@inheritdoc}
     */
    public function getTo()
    {
        return $this->to;
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
        throw new \BadMethodCallException('Cannot convert a conversion rate to a string.');
    }

    /**
     * Set the conversion rate of the currency.
     *
     * @param float $exchangeRate
     */
    protected function setExchangeRate($exchangeRate)
    {
        if (false === is_float($exchangeRate)) {
            throw new \InvalidArgumentException(sprintf('ExchangeRate has to be a float. %s given.', $exchangeRate));
        }

        $this->exchangeRate = $exchangeRate;
    }

    /**
     * Set the conversion rate of the currency.
     *
     * @param \DateTime $exchangeRateDate
     */
    protected function setExchangeRateDate(\DateTime $exchangeRateDate)
    {

        $this->exchangeRateDate = $exchangeRateDate;
    }

    /**
     * The Currency in which the base amount is.
     *
     * @param CurrencyInterface $from
     */
    protected function setFrom(CurrencyInterface $from)
    {
        $this->from = $from;
    }

    /**
     * The Currency in which the base amount has to be converted.
     * 
     * @param CurrencyInterface $to
     */
    protected function setTo(CurrencyInterface $to)
    {
        $this->to = $to;
    }
}
