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
use Doctrine\ORM\Mapping as ORM;

/**
 * {@inheritdoc}
 *
 * @ORM\Embeddable
 */
class Address extends BaseAddress implements AddressInterface
{
    use ComplexValueObjectTrait {
        __construct as traitConstruct;
    }
    use DisableWritingMethodsTrait;

    /**
     * @var string
     *
     * @ORM\Column(name="line1", type="string", nullable=true)
     */
    protected $addressLine1;

    /**
     * @var string
     *
     * @ORM\Column(name="line2", type="string", nullable=true)
     */
    protected $addressLine2;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string", nullable=true)
     */
    protected $postalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="locality", type="string", nullable=true)
     */
    protected $locality;

    /**
     * @var string
     *
     * @ORM\Column(name="administrative_area", type="string", nullable=true)
     */
    protected $administrativeArea;

    /**
     * @var string
     *
     * @ORM\Column(name="country_code", type="string", nullable=true)
     */
    protected $countryCode;

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
            'html' => true,
            'html_tag' => 'p',
            'html_attributes' => ['translate' => 'no']
        ];

        $options += $defaultOptions;
        $addressFormatRepository = new AddressFormatRepository();
        $countryRepository = new CountryRepository();
        $subdivisionRepository = new SubdivisionRepository();
        $formatter = new DefaultFormatter($addressFormatRepository, $countryRepository, $subdivisionRepository, $options['locale'], $options);

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

    /**
     * @param string $addressLine1
     */
    protected function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = $addressLine1;
    }

    /**
     * @param string $addressLine2
     */
    protected function setAddressLine2($addressLine2)
    {
        $this->addressLine2 = $addressLine2;
    }

    /**
     * @param string $administrativeArea
     */
    protected function setAdministrativeArea($administrativeArea)
    {
        $this->administrativeArea = $administrativeArea;
    }

    /**
     * @param string $countryCode
     */
    protected function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @param string $dependentLocality
     */
    protected function setDependentLocality($dependentLocality)
    {
        $this->dependentLocality = $dependentLocality;
    }

    /**
     * @param string $locale
     */
    protected function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * @param string $locality
     */
    protected function setLocality($locality)
    {
        $this->locality = $locality;
    }

    /**
     * @param string $organization
     */
    protected function setOrganization($organization)
    {
        $this->organization = $organization;
    }

    /**
     * @param string $postalCode
     */
    protected function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @param string $recipient
     */
    protected function setRecipient($recipient)
    {
        $this->recipient = $recipient;
    }
}
