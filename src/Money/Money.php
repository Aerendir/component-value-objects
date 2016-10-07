<?PHP

/**
 *  A Money value object.
 *
 * This is a simple wrapper for giggsey/libphonenumber-for-php
 *
 * @link https://github.com/sebastianbergmann/money
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */
namespace SerendipityHQ\Component\ValueObjects\Money;

use \SebastianBergmann\Money\Money as BaseMoney;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectTrait;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;
use SerendipityHQ\Component\ValueObjects\Currency\Currency;

/**
 * The class doesn't extend the base money object has it has private properties and methods that make difficult the
 * integration.
 *
 * So the base money object is stored in a proprty in this class and this class operates like a simple wrapper.
 *
 * {@inheritdoc}
 */
class Money implements MoneyInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    /**
     * This represents the amount as Money intends it: in its base units.
     *
     * 10 = 00.1 {CURRENCY}
     * 100 = 1.00 {CURRENCY}
     *
     * @var int
     */
    private $amount;

    /** @var  Currency */
    private $currency;

    /** @var BaseMoney  */
    private $valueObject;

    /**
     * {@inheritdoc}
     */
    public function __construct(array $values = [])
    {
        // Set values in the object
        $this->traitConstruct($values);

        if (is_string($this->amount)) {
            $this->valueObject = BaseMoney::fromString($this->amount, $this->currency);
        } elseif (is_float($this->amount)) {
            $this->valueObject = BaseMoney::fromString((string) $this->amount, $this->currency);
        } elseif (is_int($this->amount)) {
            // Maybe is int: leave to BaseMoney other checks
            $this->valueObject = new BaseMoney($this->amount, $this->currency);
        } else {
            throw new \InvalidArgumentException(sprintf('The amount has to be a string or a float (ex.: 35.5 Euros) or'
            . ' an int in the base form (355 = 35.5 Euros). %s given.', gettype($this->amount)));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function add(Money $other)
    {
        $toAdd = new BaseMoney($other->getAmount(), $other->getCurrency());

        $result = $this->valueObject->add($toAdd);

        return new static(['amount' => $result->getAmount(), 'currency' => $this->currency]);
    }

    /**
     * {@inheritdoc}
     */
    public function getAmount()
    {
        return $this->valueObject->getAmount();
    }

    /**
     * {@inheritdoc}
     */
    public function getConvertedAmount()
    {
        return $this->valueObject->getConvertedAmount();
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrency()
    {
        return $this->valueObject->getCurrency();
    }

    /**
     * {@inheritdoc}
     */
    public function subtract(Money $other)
    {
        $toSub = new BaseMoney($other->getAmount(), $other->getCurrency());

        $result = $this->valueObject->subtract($toSub);

        return new static(['amount' => $result->getAmount(), 'currency' => $this->currency]);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->__toString();
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return (string) $this->amount . ' ' . $this->getCurrency()->getDisplayName();
    }

    /**
     * Sets the amount.
     *
     * @param int $amount
     */
    protected function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * Sets the currency.
     *
     * @param \SebastianBergmann\Money\Currency|string|\SerendipityHQ\Component\ValueObjects\Currency\Currency $currency
     */
    protected function setCurrency($currency)
    {
        if (is_string($currency)) {
            $currency = new Currency($currency);
        }

        $this->currency = $currency;
    }
}
