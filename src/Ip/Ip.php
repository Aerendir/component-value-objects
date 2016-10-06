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
     * Validate IP Address.
     *
     * This is only a static helper method, it is not used internally.
     *
     * Method taken from the version 2.0.2 of the Darsyn\Ip value object.
     *
     * @See https://github.com/darsyn/ip/blob/2.0.2/src/IP.php#L30-L46
     *
     * @param string $ip
     *
     * @return bool
     */
    public static function validate($ip)
    {
        // Check that the IP address supplied is either 16 bytes long (binary notation) or validates as IPv4 or IPv6
        // notation via PHP's in-built validator.
        return is_string($ip) && (strlen($ip) === 16 || filter_var($ip, FILTER_VALIDATE_IP));
    }

    /**
     * {@inheritdoc}
     */
    public function __construct($value)
    {
        if (!self::validate($value)) {
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
