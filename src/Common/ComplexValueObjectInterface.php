<?PHP

/**
 *  A common interface for all value objects.
 *
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */

namespace SerendipityHQ\Component\ValueObjects\Common;

/**
 * Defines the minimum requirements of a Complex Value Object.
 *
 * A Value Object is complex when it requires more than one value to be fully populated.
 *
 * The values can be of any type supported by PHP.
 *
 * @link http://php.net/manual/en/types.comparisons.php
 */
interface ComplexValueObjectInterface extends ValueObjectInterface
{
    /**
     * Accepts an array containing the values to set in the object.
     *
     * @param array $values
     */
    public function __construct(array $values);
}
