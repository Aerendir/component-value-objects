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
 * Defines the minimum requisites of Value Objects.
 */
interface ValueObjectInterface
{
    /**
     * The string representation of the object.
     *
     * This method can accept options to refine the string returned.
     *
     * @return string
     */
    public function toString(array $options = []);

    /**
     * The string representation of the object.
     *
     * @return string
     */
    public function __toString();

    /**
     * Disable the __set magic method.
     *
     * Implement this way:
     *
     *     public function __set($field, $value)
     *     {
     *         // Body MUST BE EMPTY
     *     }
     *
     * @param mixed $field
     * @param mixed $value
     */
    public function __set($field, $value);
}
