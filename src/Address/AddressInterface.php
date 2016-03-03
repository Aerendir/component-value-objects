<?PHP

/**
 *  An Address value object.
 *
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */

namespace SerendipityHQ\Component\ValueObjects\Address;

use CommerceGuys\Addressing\Model\ImmutableAddressInterface;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Defines the minimum requisites of an Address object.
 *
 * {@inheritdoc}
 */
interface AddressInterface extends ImmutableAddressInterface, ComplexValueObjectInterface
{
}
