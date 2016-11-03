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
namespace SerendipityHQ\Component\ValueObjects\Address\Bridge\Doctrine;

use SerendipityHQ\Component\ValueObjects\Address\Address;
use Doctrine\ORM\Mapping as ORM;

/**
 * {@inheritdoc}
 *
 * @ORM\Embeddable
 */
class AddressEmbeddable extends Address
{
    /**
     * @param string $administrativeArea
     */
    public function setAdministrativeArea($administrativeArea)
    {
        parent::setAdministrativeArea($administrativeArea);
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode($countryCode)
    {
        parent::setCountryCode($countryCode);
    }

    /**
     * @param string $dependentLocality
     */
    public function setDependentLocality($dependentLocality)
    {
        parent::setDependentLocality($dependentLocality);
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        parent::setStreet($street);
    }

    /**
     * @param string $extraLine
     */
    public function setExtraLine($extraLine)
    {
        parent::setExtraLine($extraLine);
    }

    /**
     * @param string $locality
     */
    public function setLocality($locality)
    {
        parent::setLocality($locality);
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        parent::setPostalCode($postalCode);
    }
}
