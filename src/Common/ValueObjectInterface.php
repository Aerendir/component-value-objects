<?PHP

/**
 *  A common interface for all value objects.
 *
 * @package  Serendipity\Framework
 * @subpackage ValueObjects
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */

namespace SerendipityHQ\Component\ValueObjects\Common;

interface ValueObjectInterface
{
    public function __toString();
    public function __set($field, $value);
}
