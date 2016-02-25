<?PHP

/**
 *  An Email value object.
 *
 * This is inspired by the wowo Email Value Object
 *
 * @link https://gist.github.com/wowo/b49ac45b975d5c489214
 * @link https://github.com/egulias/EmailValidator
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */
namespace SerendipityHQ\Component\ValueObjects\Ip;

/**
 * {@inheritdoc}
 */
class Ip extends \Darsyn\IP\IP implements IpInterface
{
    public function __set($field, $value){}
}
