<?PHP

/**
 *  A Phone value object.
 *
 * This is a simple wrapper for giggsey/libphonenumber-for-php
 *
 * @link https://github.com/giggsey/libphonenumber-for-php
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */
namespace SerendipityHQ\Component\ValueObjects\Phone;

use libphonenumber\PhoneNumber;
use libphonenumber\PhoneNumberUtil;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectTrait;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * Default implementation of a Phone object.
 */
class Phone extends PhoneNumber implements PhoneInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    private $number;
    private $region;

    /**
     * {@inheritdoc}
     */
    public function __construct(array $values)
    {
        $this->traitConstruct($values);

        $keepRawInput = isset($values['keepRawInput']) ? $values['keepRawInput'] : false;

        if (is_string($this->number)) {
            $phoneUtil = PhoneNumberUtil::getInstance();
            $this->number = $phoneUtil->parse($this->number, $this->region, null, $keepRawInput);
        }

        if ($this->number instanceof PhoneNumber) {
            $this->mergeFrom($this->number);
        }
    }

    /**
     * @param string|Phone $number
     */
    private function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @param string $region
     */
    private function setRegion($region)
    {
        $this->region = $region;
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
        return parent::__toString();
    }
}
