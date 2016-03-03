<?PHP

/**
 *  An Address value object.
 *
 * This Value Object use commerceguys/addressing library
 *
 * @link https://github.com/commerceguys/addressing
 *
 * Other useful libraries:
 * - https://github.com/black-project/Address
 * - https://github.com/adamlc/address-format
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */

namespace SerendipityHQ\Component\ValueObjects\Address;

use CommerceGuys\Addressing\Formatter\DefaultFormatter;
use CommerceGuys\Addressing\Model\Address as BaseAddress;
use CommerceGuys\Addressing\Repository\AddressFormatRepository;
use CommerceGuys\Addressing\Repository\CountryRepository;
use CommerceGuys\Addressing\Repository\SubdivisionRepository;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectTrait;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * {@inheritdoc}
 */
class Address extends BaseAddress implements AddressInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    /**
     * {@inheritdoc}
     */
    public function __construct(array $values)
    {
        // Set values in the object
        $this->traitConstruct($values);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $defaultOptions = [
            'locale' => null,
            // From DefaultFormatter::getDefaultOptions()
            'html'            => true,
            'html_tag'        => 'p',
            'html_attributes' => ['translate' => 'no']
        ];

        $options += $defaultOptions;
        $addressFormatRepository = new AddressFormatRepository();
        $countryRepository       = new CountryRepository();
        $subdivisionRepository   = new SubdivisionRepository();
        $formatter               = new DefaultFormatter($addressFormatRepository, $countryRepository, $subdivisionRepository, $options['locale'], $options);

        // Options passed to the constructor or setOption / setOptions allow turning
        // off html rendering, customizing the wrapper element and its attributes.
        return $formatter->format($this);
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->toString();
    }

    protected function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = $addressLine1;
    }

    protected function setAddressLine2($addressLine2)
    {
        $this->addressLine2 = $addressLine2;
    }

    protected function setAdministrativeArea($administrativeArea)
    {
        $this->administrativeArea = $administrativeArea;
    }

    protected function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    protected function setDependentLocality($dependentLocality)
    {
        $this->dependentLocality = $dependentLocality;
    }

    protected function setLocale($locale)
    {
        $this->locale = $locale;
    }

    protected function setLocality($locality)
    {
        $this->locality = $locality;
    }

    protected function setOrganization($organization)
    {
        $this->organization = $organization;
    }

    protected function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    protected function setRecipient($recipient)
    {
        $this->recipient = $recipient;
    }
}
