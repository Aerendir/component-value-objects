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

use \Darsyn\IP\IP as BaseIp;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * {@inheritdoc}
 */
class Ip extends BaseIp implements IpInterface
{
    use DisableWritingMethodsTrait;

    /**
     * {@inheritdoc}
     */
    public function __construct($value)
    {
        if (!BaseIp::validate($value)) {
            throw new \InvalidArgumentException(sprintf('The passed value "%s" does not look like an IP.', $value));
        }

        parent::__construct($value);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        return $this->__toString();
    }
}
