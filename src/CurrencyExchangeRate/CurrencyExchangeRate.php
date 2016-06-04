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
    private $fromCurrency;
    private $toCurrency;

    /**
     * Constructor.
     *
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
    public function getFromCurrency()
    {
        return $this->fromCurrency;
    }

    /**
     * {@inheritdoc}
     */
    public function getToCurrency()
    {
        return $this->toCurrency;
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
        return '1 ' . $this->getFromCurrency() . ' is equal to ' . $this->getExchangeRate() . ' ' . $this->getToCurrency() . ' on ' . $this->getExchangeRateDate()->format('Y-m-d H:i:s');
    }

    /**
     * Set the conversion rate of the currency.
     *
     * @param float $exchangeRate
     */
    protected function setExchangeRate($exchangeRate)
    {
        if (false === is_float($exchangeRate)) {
            throw new \InvalidArgumentException(sprintf('ExchangeRate has to be a float. %s given.', gettype($exchangeRate)));
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
     * @param CurrencyInterface $fromCurrency
     */
    protected function setFromCurrency(CurrencyInterface $fromCurrency)
    {
        $this->fromCurrency = $fromCurrency;
    }

    /**
     * The Currency in which the base amount has to be converted.
     *
     * @param CurrencyInterface $toCurrency
     */
    protected function setToCurrency(CurrencyInterface $toCurrency)
    {
        $this->toCurrency = $toCurrency;
    }
}
