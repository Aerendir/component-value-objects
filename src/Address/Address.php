<?PHP

/**
 *  An Address value object.
 *
 * This Value Object use commerceguys/addressing library
 * @link https://github.com/commerceguys/addressing
 *
 * Other useful libraries:
 * - https://github.com/black-project/Address
 * - https://github.com/adamlc/address-format
 *
 * @package  Serendipity\Framework
 * @subpackage ValueObjects
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */

namespace SerendipityHQ\Framework\ValueObjects\Address;

use CommerceGuys\Addressing\Model\Address as BaseAddress;

use CommerceGuys\Addressing\Formatter\DefaultFormatter;
use CommerceGuys\Addressing\Repository\AddressFormatRepository;
use CommerceGuys\Addressing\Repository\CountryRepository;
use CommerceGuys\Addressing\Repository\SubdivisionRepository;

class Address extends BaseAddress implements AddressInterface
{
    /**
     * @var String The original passed address
     */
    protected $address;

    public function __construct(array $address)
    {
        $this->address = $address;

        foreach ($this->address as $property => $value)
        {
            $method = 'set' . ucfirst($property);

            if (method_exists($this, $method))
            {
                parent::$method($value);
            }
        }
    }

    public function __toString()
    {
        $addressFormatRepository = new AddressFormatRepository();
        $countryRepository = new CountryRepository();
        $subdivisionRepository = new SubdivisionRepository();
        $formatter = new DefaultFormatter($addressFormatRepository, $countryRepository, $subdivisionRepository);

        // Options passed to the constructor or setOption / setOptions allow turning
        // off html rendering, customizing the wrapper element and its attributes.
        return $formatter->format($this);
    }

    public function __set($field, $value){}
}
