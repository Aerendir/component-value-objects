<?PHP

/**
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */
namespace SerendipityHQ\Component\ValueObjects\Common;

/**
 * Defines the minimum requirements of a Simple Value Object.
 *
 * A Value Object is simple when it accepts only a single value.
 *
 * The value can be of any type supported by PHP.
 *
 * @link http://php.net/manual/en/types.comparisons.php
 */
interface SimpleValueObjectInterface extends ValueObjectInterface
{
    /**
     * Accepts a simple scalar value.
     *
     * @param mixed $value
     */
    public function __construct($value);
}
