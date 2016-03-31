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
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectTrait;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * {@inheritdoc}
 */
class Currency extends BaseCurrency implements CurrencyInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    private $conversionRate;

    /**
     * @param array $values
     */
    public function __construct(array $values)
    {
        if (false === isset($values['IsoCode'])) {
            throw new \InvalidArgumentException('Missing IsoCode of the Currency. It is required.');
        }

        $isoCode = $values['IsoCode'];
        unset($values['IsoCode']);

        $this->traitConstruct($values);
        parent::__construct($isoCode);
    }

    /**
     * {@inheritdoc}
     */
    public function getConversionRate()
    {
        return $this->conversionRate;
    }

    /**
     * {@inheritdoc}
     */
    public function getIsoCode()
    {
        return $this->getCurrencyCode();
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

    /**
     * Set the conversion rate of the currency.
     *
     * @param float $conversionRate
     */
    protected function setConversionRate($conversionRate)
    {
        if (false === is_float($conversionRate)) {
            throw new \InvalidArgumentException(sprintf('ConversionRate has to be a float. %s given.', $conversionRate));
        }

        $this->conversionRate = $conversionRate;
    }
}
