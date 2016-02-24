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

use \CommerceGuys\Addressing\Model\AddressInterface as BaseAddressInterface;
use SerendipityHQ\Component\ValueObjects\Common\ValueObjectInterface;

/**
 * {@inheritdoc}
 */
interface AddressInterface extends BaseAddressInterface, ValueObjectInterface
{
}
