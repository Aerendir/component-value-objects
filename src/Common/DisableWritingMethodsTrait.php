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
 * Implements basic constructor for complex value objects.
 */
trait DisableWritingMethodsTrait
{
    /**
     * @see {@link ValueObjectInterface}
     */
    public function __set($field, $value)
    {
    }
}
